@props(['variant' => 'horizontal', 'class' => 'h-8 w-auto'])

@if ($variant === 'stacked')
    <img src="{{ asset('images/logo-stacked.png') }}" width="360" height="247" alt="{{ config('site.name') }}" {{ $attributes->merge(['class' => $class]) }}>
@else
    <img src="{{ asset('images/logo.png') }}" width="360" height="103" alt="{{ config('site.name') }}" {{ $attributes->merge(['class' => $class]) }}>
@endif
