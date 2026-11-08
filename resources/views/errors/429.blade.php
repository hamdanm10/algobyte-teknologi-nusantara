<x-layout :title="__('errors.429.title')">
    <section class="section">
        <div class="container-site">
            <h1 class="text-hero max-w-[16ch]">{{ __('errors.429.title') }}</h1>
            <p class="text-lead mt-6 max-w-prose">{{ __('errors.429.body') }}</p>
            <div class="mt-9 flex flex-wrap gap-4">
                <x-button :href="localized_route('home')">{{ __('errors.home') }}</x-button>
                <x-button :href="localized_route('services')" variant="secondary">{{ __('site.nav.services') }}</x-button>
            </div>
        </div>
    </section>
</x-layout>
