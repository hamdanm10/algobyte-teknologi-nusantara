@props(['slug'])

<a href="{{ localized_route('services.show', ['slug' => $slug]) }}"
   class="group flex h-full flex-col rounded-panel bg-surface p-6 shadow-card transition-shadow duration-200 hover:shadow-nav sm:p-8">
    <span class="flex size-12 items-center justify-center rounded-control bg-brand-soft text-plum">
        <x-icon :name="$slug" />
    </span>
    <h3 class="text-card-title mt-6">{{ __('services.items.'.$slug.'.name') }}</h3>
    <p class="mt-3 mb-6 text-ink-muted">{{ __('services.items.'.$slug.'.summary') }}</p>
    <span class="link mt-auto inline-block pt-2 font-medium group-hover:text-accent">{{ __('services.learn_more') }}</span>
</a>
