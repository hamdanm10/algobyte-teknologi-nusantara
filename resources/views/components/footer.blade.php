@php
    $alternates = \App\Support\LocalizedUrl::alternates(request()->route());
@endphp

<footer class="border-t border-line bg-surface">
    <div class="container-site grid gap-10 py-12 lg:grid-cols-[1.4fr_1fr_1fr] lg:py-16">
        <div class="max-w-sm">
            <a href="{{ localized_route('home') }}" aria-label="{{ config('site.name') }}">
                <x-logo variant="stacked" class="h-24 w-auto" />
            </a>
            <p class="mt-5 text-ink-muted">{{ __('site.footer.tagline') }}</p>
        </div>

        <nav aria-labelledby="footer-company">
            <h2 id="footer-company" class="font-display text-lg font-semibold">{{ __('site.footer.company') }}</h2>
            <ul class="mt-4 space-y-1">
                @foreach (['services', 'projects', 'about', 'contact'] as $key)
                    <li><a href="{{ localized_route($key) }}" class="link inline-block py-1">{{ __('site.nav.'.$key) }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav aria-labelledby="footer-legal">
            <h2 id="footer-legal" class="font-display text-lg font-semibold">{{ __('site.footer.legal') }}</h2>
            <ul class="mt-4 space-y-1">
                <li><a href="{{ localized_route('privacy') }}" class="link inline-block py-1">{{ __('site.footer.privacy') }}</a></li>
                <li><a href="{{ localized_route('terms') }}" class="link inline-block py-1">{{ __('site.footer.terms') }}</a></li>
            </ul>
        </nav>
    </div>

    <div class="border-t border-line">
        <div class="container-site flex flex-col gap-3 py-5 text-sm text-ink-muted sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ now()->year }} {{ config('site.name') }}. {{ __('site.footer.rights') }}</p>
            <x-language-switcher :alternates="$alternates" placement="up" />
        </div>
    </div>
</footer>
