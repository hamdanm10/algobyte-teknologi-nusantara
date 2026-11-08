@props(['title', 'lead' => null, 'level' => 2, 'tone' => 'light'])

<div {{ $attributes->merge(['class' => 'max-w-2xl']) }}>
    <h{{ $level }} class="{{ $level === 1 ? 'text-hero' : 'text-section' }} {{ $tone === 'dark' ? '!text-paper' : '' }}">{{ $title }}</h{{ $level }}>
    @if ($lead)
        <p class="text-lead mt-4 max-w-prose {{ $tone === 'dark' ? '!text-paper/80' : '' }}">{{ $lead }}</p>
    @endif
</div>
