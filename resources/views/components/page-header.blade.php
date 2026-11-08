@props(['title', 'lead' => null, 'illustration', 'size' => '1600×900'])

<section class="section overflow-hidden pb-10 pt-10 lg:pb-16 lg:pt-14">
    <div class="container-site grid items-center gap-10 lg:grid-cols-[minmax(0,1fr)_minmax(0,1.1fr)] lg:gap-12">
        <div>
            <x-section-heading :title="$title" :lead="$lead" :level="1" />
            {{ $slot }}
        </div>
        <x-bleed side="right">
            <x-illustration :name="$illustration" ratio="16/9" :size="$size" bleed eager />
        </x-bleed>
    </div>
</section>
