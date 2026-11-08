<x-layout :title="__('services.title')" :description="__('services.lead')">
    <x-page-header :title="__('services.title')" :lead="__('services.lead')" illustration="page-services" />

    <section class="section pt-4 lg:pt-8">
        <div class="container-site grid gap-6 sm:grid-cols-2">
            @foreach ($services as $i => $slug)
                <x-service-card :slug="$slug" :tint="['bg-brand-soft', 'bg-accent/10', 'bg-plum/10', 'bg-highlight/25'][$i % 4]" />
            @endforeach
        </div>
    </section>

    <x-cta-panel :title="__('services.cta.title')" :body="__('services.cta.body')" :button="__('services.cta.button')" />
</x-layout>
