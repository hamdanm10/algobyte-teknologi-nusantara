<x-layout :title="__('services.title')" :description="__('services.lead')">
    <section class="section pb-8 lg:pb-12">
        <div class="container-site">
            <x-section-heading :title="__('services.title')" :lead="__('services.lead')" :level="1" />
        </div>
    </section>

    <section class="section pt-0 lg:pt-0">
        <div class="container-site grid gap-6 sm:grid-cols-2">
            @foreach ($services as $slug)
                <x-service-card :slug="$slug" />
            @endforeach
        </div>
    </section>

    <x-cta-panel :title="__('services.cta.title')" :body="__('services.cta.body')" :button="__('services.cta.button')" />
</x-layout>
