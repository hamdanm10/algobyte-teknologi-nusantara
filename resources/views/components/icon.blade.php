@props(['name'])

<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" {{ $attributes->merge(['class' => 'size-6']) }}>
    @switch($name)
        @case('web-development')
            <rect x="3" y="4" width="18" height="16" rx="2" />
            <path d="M3 9h18M7 6.5h.01M10 6.5h.01" />
            @break
        @case('mobile-apps')
            <rect x="7" y="2.5" width="10" height="19" rx="2" />
            <path d="M11 18.5h2" />
            @break
        @case('custom-systems')
            <path d="m12 3 8 4.5-8 4.5-8-4.5L12 3Z" />
            <path d="m4 12 8 4.5 8-4.5M4 16.5 12 21l8-4.5" />
            @break
        @case('maintenance-support')
            <path d="M14.5 6.5a4 4 0 0 0 5 5L10 21l-3-3 9.5-9.5" />
            <path d="m6 6 3 3M3.5 3.5 6 6" />
            @break
        @case('image')
            <rect x="3" y="4" width="18" height="16" rx="2" />
            <circle cx="9" cy="10" r="1.5" />
            <path d="m21 16-5-5-8 9" />
            @break
        @case('check')
            <path d="m5 12.5 4.5 4.5L19 7.5" />
            @break
        @case('chevron')
            <path d="m6 9 6 6 6-6" />
            @break
        @case('menu')
            <path d="M4 7h16M4 12h16M4 17h16" />
            @break
        @case('close')
            <path d="m6 6 12 12M18 6 6 18" />
            @break
    @endswitch
</svg>
