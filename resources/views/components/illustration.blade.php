{{--
    Illustration slot. Drop public/images/illustrations/{name}.svg (or .webp, .png, .jpg) and it replaces
    the placeholder automatically. The slot content is the fallback shown while no file exists.
    Slots and briefs: docs/illustrations.md
--}}
@props(['name', 'ratio' => '4/3', 'size' => '1200×900', 'tone' => 'light', 'eager' => false])

@php
    $file = collect(['svg', 'webp', 'png', 'jpg'])
        ->map(fn (string $ext): string => $name.'.'.$ext)
        ->first(fn (string $candidate): bool => is_file(public_path('images/illustrations/'.$candidate)));
    $dark = $tone === 'dark';
@endphp

@if ($file)
    <img src="{{ asset('images/illustrations/'.$file) }}" alt="" role="presentation"
         loading="{{ $eager ? 'eager' : 'lazy' }}" decoding="async"
         style="aspect-ratio: {{ $ratio }}"
         {{ $attributes->merge(['class' => 'h-auto w-full object-contain']) }}>
@elseif ($slot->isNotEmpty())
    <div {{ $attributes->merge(['class' => 'w-full']) }}>{{ $slot }}</div>
@else
    <div aria-hidden="true" data-illustration="{{ $name }}" style="aspect-ratio: {{ $ratio }}"
         {{ $attributes->merge(['class' => 'bg-dots grid w-full place-items-center overflow-hidden rounded-panel border-2 border-dashed p-4 text-center '.($dark ? 'border-paper/40 bg-paper/10 text-paper' : 'border-plum/40 bg-brand-soft text-plum')]) }}>
        <div>
            <x-icon name="image" class="mx-auto size-10 opacity-80" />
            <p class="mt-3 font-display text-lg font-medium">{{ __('site.placeholder.title') }}</p>
            <p class="mt-1 text-sm">{{ $name }} &middot; {{ $size }}</p>
        </div>
    </div>
@endif
