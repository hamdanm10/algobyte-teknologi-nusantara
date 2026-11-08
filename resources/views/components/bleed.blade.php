{{-- Lets an illustration run to the viewport edge on desktop and across the full width on mobile. --}}
@props(['side' => 'right'])

@php
    $classes = $side === 'left'
        ? '-mx-[var(--gutter)] lg:mr-0 lg:bleed-l'
        : '-mx-[var(--gutter)] lg:ml-0 lg:bleed-r';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</div>
