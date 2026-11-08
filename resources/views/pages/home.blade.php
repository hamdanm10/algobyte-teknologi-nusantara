<x-layout :title="__('home.title')" :description="__('site.description')">
    {{-- Hero --}}
    <section class="section relative overflow-hidden pb-12 pt-10 lg:pb-24 lg:pt-16">
        <div class="container-site grid items-center gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:gap-16">
            <div>
                <h1 class="text-hero max-w-[18ch] sm:max-w-[20ch]">{{ __('home.hero.title') }}</h1>
                <p class="text-lead mt-6 max-w-prose">{{ __('home.hero.lead') }}</p>
                <div class="mt-9 flex flex-wrap gap-4">
                    <x-button :href="localized_route('contact')">{{ __('home.hero.primary') }}</x-button>
                    <x-button :href="localized_route('services')" variant="secondary">{{ __('home.hero.secondary') }}</x-button>
                </div>
                <ul class="mt-10 flex flex-wrap gap-x-6 gap-y-3">
                    @foreach (__('home.hero.points') as $point)
                        <li class="flex items-center gap-2 font-medium">
                            <x-icon name="check" class="size-5 text-plum" />
                            {{ $point }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="relative mx-auto w-full max-w-md lg:max-w-none">
                <div class="bg-dots absolute -inset-4 rounded-panel bg-brand-soft lg:-inset-6" aria-hidden="true"></div>
                <x-illustration name="hero" ratio="6/5" size="1200×1000" class="relative" eager>
                    <x-hero-blocks class="mx-auto max-w-sm py-6" />
                </x-illustration>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="section" aria-labelledby="services-title">
        <div class="container-site">
            <div class="flex flex-wrap items-end justify-between gap-6">
                <div class="max-w-2xl">
                    <h2 id="services-title" class="text-section">{{ __('home.services.title') }}</h2>
                    <p class="text-lead mt-4 max-w-prose">{{ __('home.services.lead') }}</p>
                </div>
                <a href="{{ localized_route('services') }}" class="link py-2 font-medium">{{ __('home.services.all') }}</a>
            </div>
            <div class="mt-10 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($services as $i => $slug)
                    <x-service-card :slug="$slug" :tint="['bg-brand-soft', 'bg-accent/10', 'bg-plum/10', 'bg-highlight/25'][$i % 4]" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- Process: a real sequence, so the steps are numbered. --}}
    <section class="section border-y border-line bg-surface" aria-labelledby="process-title">
        <div class="container-site">
            <x-section-heading :title="__('home.process.title')" :lead="__('home.process.lead')" id="process-title" />
            <ol class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach (__('home.process.steps') as $i => $step)
                    <li class="relative rounded-panel bg-paper p-6 pt-12 sm:p-7 sm:pt-14">
                        <span class="absolute left-6 top-0 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-control bg-brand font-display text-xl font-semibold text-ink sm:left-7">{{ $i + 1 }}</span>
                        <h3 class="text-card-title">{{ $step['title'] }}</h3>
                        <p class="mt-3 text-ink-muted">{{ $step['body'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- Why us: alternating rows, each with its own illustration. --}}
    <section class="section bg-ink text-paper" aria-labelledby="why-title">
        <div class="container-site">
            <x-section-heading :title="__('home.why.title')" :lead="__('home.why.lead')" tone="dark" id="why-title" />
            <div class="mt-14 space-y-16 lg:space-y-24">
                @foreach (__('home.why.points') as $i => $point)
                    <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-20">
                        <div class="{{ $i % 2 ? 'lg:order-2' : '' }}">
                            <h3 class="text-card-title !text-highlight">{{ $point['title'] }}</h3>
                            <p class="mt-3 max-w-prose text-lg text-paper/80">{{ $point['body'] }}</p>
                        </div>
                        <x-illustration :name="['feature-team', 'feature-design', 'feature-maintain'][$i]" ratio="3/2" size="1200×800" tone="dark" class="{{ $i % 2 ? 'lg:order-1' : '' }}" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="section" aria-labelledby="faq-title">
        <div class="container-site grid gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20">
            <x-section-heading :title="__('home.faq.title')" :lead="__('home.faq.lead')" id="faq-title" />
            <div class="divide-y divide-line border-y border-line">
                @foreach (__('home.faq.items') as $item)
                    <details class="group py-1">
                        <summary class="flex min-h-14 cursor-pointer list-none items-center justify-between gap-6 py-3 font-display text-xl font-medium marker:content-none [&::-webkit-details-marker]:hidden">
                            {{ $item['q'] }}
                            <x-icon name="chevron" class="size-6 shrink-0 text-plum transition-transform duration-200 group-open:rotate-180" />
                        </summary>
                        <p class="max-w-prose pb-5 text-ink-muted">{{ $item['a'] }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    <x-cta-panel :title="__('home.cta.title')" :body="__('home.cta.body')" :button="__('home.cta.button')" />
</x-layout>
