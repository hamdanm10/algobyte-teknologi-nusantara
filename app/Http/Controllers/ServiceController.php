<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('pages.services.index', ['services' => config('site.services')]);
    }

    public function show(string $slug): View
    {
        abort_unless(in_array($slug, config('site.services'), true), 404);

        return view('pages.services.show', [
            'slug' => $slug,
            'services' => config('site.services'),
        ]);
    }
}
