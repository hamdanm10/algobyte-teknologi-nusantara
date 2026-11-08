{{-- Isometric blocks from the logo: tall bricks with a plum top, plus a small amber cube. --}}
@php
    $dx = 52;
    $dy = 30;
    $fmt = fn (array $points): string => implode(' ', array_map(fn ($p) => $p[0].','.$p[1], $points));

    // [front x, front y, height, top, left, right, delay]
    $blocks = [
        [120, 300, 200, 'var(--color-plum)', 'var(--color-brand)', 'var(--color-accent)', 0],
        [328, 300, 90, 'var(--color-plum)', 'var(--color-brand)', 'var(--color-accent)', 150],
        [224, 360, 140, 'var(--color-plum)', 'var(--color-brand)', 'var(--color-accent)', 300],
        [224, 190, 52, 'var(--color-highlight)', 'var(--color-brand)', 'var(--color-accent)', 650],
    ];
@endphp

<svg viewBox="0 0 448 400" role="img" aria-label="{{ __('site.nav.home') }}" aria-hidden="true" {{ $attributes->merge(['class' => 'h-auto w-full']) }}>
    @foreach ($blocks as [$x, $y, $h, $top, $left, $right, $delay])
        <g class="block-rise" style="--delay: {{ $delay }}ms">
            <polygon points="{{ $fmt([[$x - $dx, $y - $dy], [$x, $y], [$x, $y - $h], [$x - $dx, $y - $dy - $h]]) }}" fill="{{ $left }}" />
            <polygon points="{{ $fmt([[$x, $y], [$x + $dx, $y - $dy], [$x + $dx, $y - $dy - $h], [$x, $y - $h]]) }}" fill="{{ $right }}" />
            <polygon points="{{ $fmt([[$x - $dx, $y - $dy - $h], [$x, $y - $h], [$x + $dx, $y - $dy - $h], [$x, $y - 2 * $dy - $h]]) }}" fill="{{ $top }}" />
        </g>
    @endforeach
</svg>
