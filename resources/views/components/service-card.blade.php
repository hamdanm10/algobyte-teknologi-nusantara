@props(['slug', 'tint' => 'bg-brand-soft'])

<a href="{{ localized_route('services.show', ['slug' => $slug]) }}"
   class="group flex h-full flex-col overflow-hidden rounded-panel bg-surface shadow-card transition-shadow duration-200 hover:shadow-nav">
    <div class="{{ $tint }} p-4">
        <x-illustration :name="'service-'.$slug" ratio="3/2" size="1200×800" />
    </div>
    <div class="flex flex-1 flex-col p-6 sm:p-7">
        <span class="flex size-10 items-center justify-center rounded-control bg-brand-soft text-plum">
            <x-icon :name="$slug" class="size-5" />
        </span>
        <h3 class="text-card-title mt-5">{{ __('services.items.'.$slug.'.name') }}</h3>
        <p class="mb-6 mt-3 text-ink-muted">{{ __('services.items.'.$slug.'.summary') }}</p>
        <span class="link mt-auto inline-block pt-2 font-medium group-hover:text-accent">{{ __('services.learn_more') }}</span>
    </div>
</a>
