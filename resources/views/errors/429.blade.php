<x-layout :title="__('errors.429.title')">
    <x-page-header :title="__('errors.429.title')" :lead="__('errors.429.body')" illustration="not-found">
        <div class="mt-9 flex flex-wrap gap-4">
            <x-button :href="localized_route('home')">{{ __('errors.home') }}</x-button>
            <x-button :href="localized_route('services')" variant="secondary">{{ __('site.nav.services') }}</x-button>
        </div>
    </x-page-header>
</x-layout>
