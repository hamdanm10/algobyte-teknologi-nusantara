<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, array{string, string}>
     */
    public static function pages(): array
    {
        return [
            'home id' => ['/', 'id'],
            'home en' => ['/en', 'en'],
            'services id' => ['/layanan', 'id'],
            'services en' => ['/en/services', 'en'],
            'service detail id' => ['/layanan/web-development', 'id'],
            'service detail en' => ['/en/services/mobile-apps', 'en'],
            'projects id' => ['/proyek', 'id'],
            'projects en' => ['/en/projects', 'en'],
            'about id' => ['/tentang', 'id'],
            'about en' => ['/en/about', 'en'],
            'contact id' => ['/kontak', 'id'],
            'contact en' => ['/en/contact', 'en'],
            'privacy id' => ['/kebijakan-privasi', 'id'],
            'privacy en' => ['/en/privacy-policy', 'en'],
            'terms id' => ['/syarat-ketentuan', 'id'],
            'terms en' => ['/en/terms', 'en'],
        ];
    }

    #[DataProvider('pages')]
    public function test_page_renders_in_its_locale(string $url, string $locale): void
    {
        $this->get($url)
            ->assertOk()
            ->assertSee('<html lang="'.$locale.'">', false);
    }

    public function test_page_declares_alternate_language_urls(): void
    {
        $this->get('/layanan')
            ->assertSee('<link rel="alternate" hreflang="id" href="'.url('/layanan').'">', false)
            ->assertSee('<link rel="alternate" hreflang="en" href="'.url('/en/services').'">', false)
            ->assertSee('<link rel="alternate" hreflang="x-default" href="'.url('/layanan').'">', false);
    }

    public function test_service_detail_links_to_the_same_service_in_the_other_language(): void
    {
        $this->get('/en/services/custom-systems')
            ->assertSee('hreflang="id" href="'.url('/layanan/custom-systems').'"', false);
    }

    public function test_home_page_shows_text_in_the_page_language(): void
    {
        $this->get('/')->assertSee(__('home.hero.title', [], 'id'));
        $this->get('/en')->assertSee(__('home.hero.title', [], 'en'));
    }

    public function test_navigation_marks_the_current_section(): void
    {
        $this->get('/en/about')->assertSee('aria-current="page"', false);
    }

    public function test_unknown_service_returns_not_found(): void
    {
        $this->get('/layanan/does-not-exist')->assertNotFound();
        $this->get('/en/services/does-not-exist')->assertNotFound();
    }

    public function test_not_found_page_uses_the_language_of_the_path(): void
    {
        $this->get('/tidak-ada')->assertNotFound()->assertSee(__('errors.404.title', [], 'id'));
        $this->get('/en/nothing-here')->assertNotFound()->assertSee(__('errors.404.title', [], 'en'));
    }

    public function test_english_pages_are_not_served_at_unprefixed_urls(): void
    {
        $this->get('/services')->assertNotFound();
        $this->get('/id')->assertNotFound();
    }

    public function test_home_page_has_a_single_main_heading(): void
    {
        $this->assertSame(1, substr_count($this->get('/')->getContent(), '<h1'));
    }

    public function test_illustration_slot_shows_a_placeholder_until_the_file_exists(): void
    {
        $this->get('/layanan')->assertSee('data-illustration="page-services"', false);
    }

    public function test_illustration_file_replaces_the_placeholder(): void
    {
        $path = public_path('images/illustrations/page-services.svg');
        file_put_contents($path, '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"></svg>');

        try {
            $this->get('/layanan')
                ->assertDontSee('data-illustration="page-services"', false)
                ->assertSee('images/illustrations/page-services.svg', false);
        } finally {
            unlink($path);
        }
    }

    public function test_language_dropdown_lists_both_languages_and_marks_the_current_one(): void
    {
        $html = $this->get('/en/about')->getContent();

        $this->assertStringContainsString('data-dropdown', $html);
        $this->assertStringContainsString('hreflang="id" lang="id"', $html);
        $this->assertStringContainsString('href="'.url('/tentang').'"', $html);
        $this->assertStringContainsString('aria-current="true"', $html);
    }
}
