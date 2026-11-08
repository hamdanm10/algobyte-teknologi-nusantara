<x-layout :title="__('about.title')" :description="__('about.lead')">
    <x-page-header :title="__('about.title')" :lead="__('about.lead')" illustration="page-about" />

    <section class="section pt-8 lg:pt-12" aria-labelledby="what-title">
        <div class="container-site grid gap-6 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20">
            <h2 id="what-title" class="text-section">{{ __('about.what.title') }}</h2>
            <p class="text-lead max-w-prose !text-ink">{{ __('about.what.body') }}</p>
        </div>
    </section>

    <section class="section" aria-labelledby="principles-title">
        <div class="container-site">
            <h2 id="principles-title" class="text-section max-w-2xl">{{ __('about.principles.title') }}</h2>
            <ul class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach (__('about.principles.items') as $item)
                    <li class="rounded-panel bg-surface p-6 shadow-card sm:p-8">
                        <h3 class="text-card-title">{{ $item['title'] }}</h3>
                        <p class="mt-3 text-ink-muted">{{ $item['body'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <x-cta-panel :title="__('about.cta.title')" :body="__('about.cta.body')" :button="__('about.cta.button')" />
</x-layout>
