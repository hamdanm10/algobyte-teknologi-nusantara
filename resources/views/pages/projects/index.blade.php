<x-layout :title="__('projects.title')" :description="__('projects.lead')">
    <section class="section pb-8 lg:pb-12">
        <div class="container-site">
            <x-section-heading :title="__('projects.title')" :lead="__('projects.lead')" :level="1" />
        </div>
    </section>

    <section class="section pt-0 lg:pt-0">
        <div class="container-site">
            <div class="rounded-panel border border-dashed border-line bg-surface px-6 py-14 text-center sm:px-12">
                <h2 class="text-card-title">{{ __('projects.empty.title') }}</h2>
                <p class="mx-auto mt-3 max-w-prose text-ink-muted">{{ __('projects.empty.body') }}</p>
                <x-button :href="localized_route('contact')" class="mt-8">{{ __('projects.empty.button') }}</x-button>
            </div>
        </div>
    </section>
</x-layout>
