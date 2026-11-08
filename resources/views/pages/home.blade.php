<x-layout :title="__('home.title')" :description="__('site.description')">
    {{-- Hero --}}
    <section class="section overflow-hidden pb-12 pt-10 lg:pb-20 lg:pt-14">
        <div class="container-site grid items-center gap-10 lg:grid-cols-[minmax(0,1fr)_minmax(0,1.1fr)] lg:gap-12">
            <div>
                <h1 class="text-hero max-w-[18ch]">{{ __('home.hero.title') }}</h1>
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
            <x-bleed side="right" class="hero-enter">
                <x-illustration name="hero" ratio="16/9" size="1600×900" bleed eager />
            </x-bleed>
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
    <section class="section overflow-hidden border-y border-line bg-surface pb-0 lg:pb-0" aria-labelledby="process-title">
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
        <x-illustration name="process" ratio="4/1" size="2400×600" bleed class="mt-14" />
    </section>

    {{-- Why us: alternating rows. The illustration runs to the viewport edge on the side opposite the text. --}}
    <section class="section overflow-hidden bg-ink text-paper" aria-labelledby="why-title">
        <div class="container-site">
            <x-section-heading :title="__('home.why.title')" :lead="__('home.why.lead')" tone="dark" id="why-title" />
            <div class="mt-14 space-y-14 lg:space-y-20">
                @foreach (__('home.why.points') as $i => $point)
                    @php($flip = $i % 2 === 1)
                    <div class="grid items-center gap-8 lg:gap-12 {{ $flip ? 'lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)]' : 'lg:grid-cols-[minmax(0,1fr)_minmax(0,1.1fr)]' }}">
                        <div class="{{ $flip ? 'lg:order-2' : '' }}">
                            <h3 class="text-card-title !text-highlight">{{ $point['title'] }}</h3>
                            <p class="mt-3 max-w-prose text-lg text-paper/80">{{ $point['body'] }}</p>
                        </div>
                        <x-bleed :side="$flip ? 'left' : 'right'" class="{{ $flip ? 'lg:order-1' : '' }}">
                            <x-illustration :name="['feature-team', 'feature-design', 'feature-maintain'][$i]" ratio="16/9" size="1600×900" tone="dark" bleed />
                        </x-bleed>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="section overflow-hidden" aria-labelledby="faq-title">
        <div class="container-site grid gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20">
            <div>
                <x-section-heading :title="__('home.faq.title')" :lead="__('home.faq.lead')" id="faq-title" />
                <x-bleed side="left" class="mt-10 hidden lg:block">
                    <x-illustration name="faq" ratio="4/3" size="1200×900" bleed />
                </x-bleed>
            </div>
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
