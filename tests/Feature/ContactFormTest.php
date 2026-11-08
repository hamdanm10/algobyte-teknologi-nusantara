<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, string>
     */
    private function validData(): array
    {
        return [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'company' => 'PT Contoh',
            'message' => 'Kami ingin membangun sistem pemesanan internal.',
        ];
    }

    public function test_it_stores_a_valid_message_and_confirms_in_indonesian(): void
    {
        $this->post('/kontak', $this->validData())
            ->assertRedirect('/kontak#form')
            ->assertSessionHas('sent');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'budi@example.com',
            'company' => 'PT Contoh',
            'locale' => 'id',
        ]);

        $this->followingRedirects()->post('/kontak', $this->validData())->assertSee(__('contact.sent.title', [], 'id'));
    }

    public function test_it_stores_the_english_locale_for_english_pages(): void
    {
        $this->post('/en/contact', $this->validData())->assertRedirect('/en/contact#form');

        $this->assertDatabaseHas('contact_messages', ['locale' => 'en']);
    }

    public function test_company_is_optional(): void
    {
        $this->post('/kontak', ['company' => ''] + $this->validData())->assertSessionHasNoErrors();

        $this->assertDatabaseHas('contact_messages', ['email' => 'budi@example.com', 'company' => null]);
    }

    public function test_it_rejects_invalid_data_with_messages_in_the_page_language(): void
    {
        $this->from('/kontak')
            ->post('/kontak', ['name' => '', 'email' => 'bukan-email', 'message' => 'pendek'])
            ->assertRedirect('/kontak')
            ->assertSessionHasErrors(['name', 'email', 'message']);

        $this->assertDatabaseCount('contact_messages', 0);

        $this->followingRedirects()
            ->from('/en/contact')
            ->post('/en/contact', ['name' => '', 'email' => '', 'message' => ''])
            ->assertSee('The Name field is required', false);
    }

    public function test_it_rejects_overlong_input(): void
    {
        $this->post('/kontak', ['message' => str_repeat('a', 2001)] + $this->validData())
            ->assertSessionHasErrors('message');
    }

    public function test_it_rejects_submissions_that_fill_the_honeypot(): void
    {
        $this->post('/kontak', ['website' => 'https://spam.example'] + $this->validData())
            ->assertSessionHasErrors('website');

        $this->assertDatabaseCount('contact_messages', 0);
    }

    public function test_it_throttles_repeated_submissions(): void
    {
        RateLimiter::clear('contact');

        foreach (range(1, 5) as $ignored) {
            $this->post('/kontak', $this->validData())->assertRedirect();
        }

        $this->post('/kontak', $this->validData())->assertStatus(429)->assertSee(__('errors.429.title', [], 'id'));

        $this->assertSame(5, ContactMessage::count());
    }

    public function test_contact_page_shows_the_form_with_a_csrf_token(): void
    {
        $this->get('/kontak')
            ->assertSee('name="_token"', false)
            ->assertSee('name="message"', false);
    }
}
