@props(['href' => null, 'variant' => 'primary', 'type' => 'button'])

@php
    $base = 'inline-flex whitespace-nowrap items-center justify-center rounded-control px-7 py-3.5 font-display text-[1.0625rem] font-medium leading-none transition-colors duration-200 ease-out';
    $variants = [
        'primary' => 'bg-brand text-ink hover:bg-plum hover:text-paper',
        'secondary' => 'border-[1.5px] border-ink text-ink hover:bg-ink hover:text-paper',
        'dark' => 'bg-ink text-paper hover:bg-plum',
        'secondary-dark' => 'border-[1.5px] border-paper text-paper hover:bg-paper hover:text-ink',
    ];
    $classes = $base.' '.($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
@endif
