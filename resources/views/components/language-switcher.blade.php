@props(['alternates' => []])

@if (count($alternates) > 1)
    <div {{ $attributes->merge(['class' => 'items-center gap-1']) }} role="group" aria-label="{{ __('site.language.label') }}">
        @foreach ($alternates as $locale => $url)
            <a href="{{ $url }}" hreflang="{{ $locale }}" lang="{{ $locale }}"
               @if ($locale === app()->getLocale()) aria-current="true" @endif
               class="inline-flex min-h-11 min-w-11 items-center justify-center rounded-control px-2 text-sm font-semibold text-ink-muted hover:text-ink aria-[current=true]:bg-brand-soft aria-[current=true]:text-ink">
                <span aria-hidden="true">{{ $locale }}</span>
                <span class="sr-only">{{ __('site.language.'.$locale) }}</span>
            </a>
        @endforeach
    </div>
@endif
