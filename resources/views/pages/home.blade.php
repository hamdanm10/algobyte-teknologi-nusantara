<x-layout :title="__('home.title')" :description="__('site.description')">
    {{-- Hero --}}
    <section class="section pb-12 pt-10 lg:pb-20 lg:pt-16">
        <div class="container-site grid items-center gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:gap-16">
            <div>
                <h1 class="text-hero max-w-[18ch] sm:max-w-[20ch]">{{ __('home.hero.title') }}</h1>
                <p class="text-lead mt-6 max-w-prose">{{ __('home.hero.lead') }}</p>
                <div class="mt-9 flex flex-wrap gap-4">
                    <x-button :href="localized_route('contact')">{{ __('home.hero.primary') }}</x-button>
                    <x-button :href="localized_route('services')" variant="secondary">{{ __('home.hero.secondary') }}</x-button>
                </div>
            </div>
            <x-hero-blocks class="mx-auto max-w-md lg:max-w-none" />
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
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($services as $slug)
                    <x-service-card :slug="$slug" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- Process: a real sequence, so the steps are numbered. --}}
    <section class="section" aria-labelledby="process-title">
        <div class="container-site">
            <x-section-heading :title="__('home.process.title')" :lead="__('home.process.lead')" id="process-title" />
            <ol class="mt-12 grid gap-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
                @foreach (__('home.process.steps') as $i => $step)
                    <li class="border-t-2 border-ink pt-5">
                        <span class="font-display text-4xl font-semibold text-plum">{{ $i + 1 }}</span>
                        <h3 class="text-card-title mt-3">{{ $step['title'] }}</h3>
                        <p class="mt-3 text-ink-muted">{{ $step['body'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- Why us --}}
    <section class="section bg-ink text-paper" aria-labelledby="why-title">
        <div class="container-site grid gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20">
            <x-section-heading :title="__('home.why.title')" :lead="__('home.why.lead')" tone="dark" id="why-title" />
            <ul class="divide-y divide-paper/20 border-y border-paper/20">
                @foreach (__('home.why.points') as $point)
                    <li class="py-7">
                        <h3 class="text-card-title !text-highlight">{{ $point['title'] }}</h3>
                        <p class="mt-2 max-w-prose text-paper/80">{{ $point['body'] }}</p>
                    </li>
                @endforeach
            </ul>
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
