<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\ContactMessage;

final class StoreContactMessage
{
    /**
     * @param  array{name: string, email: string, company?: string|null, message: string}  $data
     */
    public function handle(array $data, string $locale): ContactMessage
    {
        return ContactMessage::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'company' => $data['company'] ?? null,
            'message' => $data['message'],
            'locale' => $locale,
        ]);
    }
}
