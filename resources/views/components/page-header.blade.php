@props(['title', 'lead' => null, 'illustration', 'size' => '1200×1000'])

<section class="section relative overflow-hidden pb-10 pt-10 lg:pb-16 lg:pt-16">
    <div class="container-site grid items-center gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:gap-16">
        <div>
            <x-section-heading :title="$title" :lead="$lead" :level="1" />
            {{ $slot }}
        </div>
        <div class="relative mx-auto w-full max-w-md lg:max-w-none">
            <div class="bg-dots absolute -inset-3 rounded-panel bg-brand-soft" aria-hidden="true"></div>
            <x-illustration :name="$illustration" ratio="6/5" :size="$size" class="relative" eager />
        </div>
    </div>
</section>
