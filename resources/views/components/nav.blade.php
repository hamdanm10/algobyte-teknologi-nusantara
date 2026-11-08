@php
    $current = \Illuminate\Support\Str::before(request()->route()?->getName() ?? '', '.');
    $alternates = \App\Support\LocalizedUrl::alternates(request()->route());
    $links = [
        'services' => __('site.nav.services'),
        'projects' => __('site.nav.projects'),
        'about' => __('site.nav.about'),
    ];
@endphp

<header class="sticky top-0 z-40 px-[var(--gutter)] pt-3" data-nav>
    <div class="mx-auto max-w-[1172px] rounded-nav bg-surface shadow-nav">
        <div class="flex items-center justify-between gap-4 px-4 py-3 lg:px-6">
            <a href="{{ localized_route('home') }}" class="shrink-0" aria-label="{{ config('site.name') }}">
                <x-logo class="h-8 w-auto" />
            </a>

            <nav class="hidden flex-1 items-center gap-1 lg:ml-6 lg:flex" aria-label="{{ __('site.nav.label') }}">
                @foreach ($links as $key => $label)
                    <a href="{{ localized_route($key) }}"
                       @if ($current === $key) aria-current="page" @endif
                       class="rounded-control px-4 py-2 font-medium text-ink-muted hover:text-ink aria-[current=page]:text-ink aria-[current=page]:shadow-[inset_0_-2px_0_var(--color-brand)]">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>

            <div class="flex items-center gap-3">
                <x-language-switcher :alternates="$alternates" class="hidden lg:block" />
                <div class="hidden lg:block">
                    <x-button :href="localized_route('contact')" class="!px-5 !py-3">{{ __('site.nav.cta') }}</x-button>
                </div>

                <button type="button" class="inline-flex size-11 items-center justify-center rounded-control text-ink hover:bg-brand-soft lg:hidden"
                        data-nav-toggle aria-expanded="false" aria-controls="mobile-menu"
                        data-label-open="{{ __('site.nav.open_menu') }}" data-label-close="{{ __('site.nav.close_menu') }}"
                        aria-label="{{ __('site.nav.open_menu') }}">
                    <x-icon name="menu" class="size-6" data-icon-open />
                    <x-icon name="close" class="hidden size-6" data-icon-close />
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden border-t border-line px-4 pb-5 pt-3 lg:hidden" data-nav-panel>
            <nav class="flex flex-col" aria-label="{{ __('site.nav.label') }}">
                @foreach ($links as $key => $label)
                    <a href="{{ localized_route($key) }}"
                       @if ($current === $key) aria-current="page" @endif
                       class="rounded-control px-3 py-3 text-lg font-medium text-ink-muted hover:bg-brand-soft hover:text-ink aria-[current=page]:text-ink aria-[current=page]:shadow-[inset_3px_0_0_var(--color-brand)]">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
            <div class="mt-4 flex items-center justify-between gap-4">
                <x-language-switcher :alternates="$alternates" />
                <x-button :href="localized_route('contact')" class="!px-5 !py-3">{{ __('site.nav.cta') }}</x-button>
            </div>
        </div>
    </div>
</header>
