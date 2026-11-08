@props(['title', 'description' => null])

@php
    $locale = app()->getLocale();
    $alternates = \App\Support\LocalizedUrl::alternates(request()->route());
    $description ??= __('site.description');
    $fullTitle = $title.' | '.config('site.name');
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $fullTitle }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="theme-color" content="#FBF8FB">
    <link rel="canonical" href="{{ url()->current() }}">
    @foreach ($alternates as $altLocale => $altUrl)
        <link rel="alternate" hreflang="{{ $altLocale }}" href="{{ $altUrl }}">
    @endforeach
    @if (isset($alternates[config('site.default_locale')]))
        <link rel="alternate" hreflang="x-default" href="{{ $alternates[config('site.default_locale')] }}">
    @endif
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('site.name') }}">
    <meta property="og:title" content="{{ $fullTitle }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="{{ $locale === 'id' ? 'id_ID' : 'en_US' }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col antialiased">
    <a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-control focus:bg-ink focus:px-4 focus:py-2 focus:text-paper">
        {{ __('site.skip_link') }}
    </a>

    <x-nav />

    <main id="content" class="flex-1">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>
