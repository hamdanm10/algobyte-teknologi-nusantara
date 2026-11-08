<x-layout :title="__('projects.title')" :description="__('projects.lead')">
    <x-page-header :title="__('projects.title')" :lead="__('projects.lead')" illustration="page-projects" />

    <section class="section pt-4 lg:pt-8">
        <div class="container-site">
            <div class="rounded-panel border border-dashed border-plum/40 bg-surface px-6 py-14 text-center sm:px-12">
                <h2 class="text-card-title">{{ __('projects.empty.title') }}</h2>
                <p class="mx-auto mt-3 max-w-prose text-ink-muted">{{ __('projects.empty.body') }}</p>
                <x-button :href="localized_route('contact')" class="mt-8">{{ __('projects.empty.button') }}</x-button>
            </div>
        </div>
    </section>
</x-layout>
