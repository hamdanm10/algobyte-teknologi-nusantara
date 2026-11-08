<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'services' => config('site.services'),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function privacy(): View
    {
        return view('pages.legal', ['page' => 'privacy']);
    }

    public function terms(): View
    {
        return view('pages.legal', ['page' => 'terms']);
    }
}
