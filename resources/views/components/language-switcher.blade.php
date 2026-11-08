@props(['alternates' => [], 'placement' => 'down'])

@if (count($alternates) > 1)
    <details data-dropdown {{ $attributes->merge(['class' => 'group relative']) }}>
        <summary class="flex min-h-11 cursor-pointer list-none items-center gap-2 rounded-control px-3 font-medium text-ink hover:bg-brand-soft group-open:bg-brand-soft marker:content-none [&::-webkit-details-marker]:hidden"
                 aria-label="{{ __('site.language.label') }}: {{ __('site.language.'.app()->getLocale()) }}">
            <x-icon name="globe" class="size-5 text-plum" />
            <span aria-hidden="true">{{ strtoupper(app()->getLocale()) }}</span>
            <x-icon name="chevron" class="size-4 text-plum transition-transform duration-200 group-open:rotate-180" />
        </summary>

        <ul class="absolute right-0 z-50 min-w-28 overflow-hidden rounded-nav border border-line bg-surface py-1 shadow-nav {{ $placement === 'up' ? 'bottom-full mb-2' : 'top-full mt-2' }}">
            @foreach ($alternates as $locale => $url)
                <li>
                    <a href="{{ $url }}" hreflang="{{ $locale }}" lang="{{ $locale }}"
                       @if ($locale === app()->getLocale()) aria-current="true" @endif
                       class="flex min-h-11 items-center justify-between gap-4 px-4 font-medium text-ink hover:bg-brand-soft aria-[current=true]:text-plum">
                        <span aria-hidden="true">{{ strtoupper($locale) }}</span>
                        <span class="sr-only">{{ __('site.language.'.$locale) }}</span>
                        @if ($locale === app()->getLocale())
                            <x-icon name="check" class="size-5 text-plum" />
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </details>
@endif
