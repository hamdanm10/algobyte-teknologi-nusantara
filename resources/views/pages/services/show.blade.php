<x-layout :title="__('services.items.'.$slug.'.name')" :description="__('services.items.'.$slug.'.summary')">
    <section class="section pb-8 lg:pb-12">
        <div class="container-site">
            <a href="{{ localized_route('services') }}" class="link inline-block py-2 font-medium">{{ __('services.back') }}</a>
            <div class="mt-6 grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:gap-16">
                <div>
                    <span class="flex size-14 items-center justify-center rounded-control bg-brand-soft text-plum">
                        <x-icon :name="$slug" class="size-7" />
                    </span>
                    <h1 class="text-hero mt-6">{{ __('services.items.'.$slug.'.name') }}</h1>
                    <p class="text-lead mt-6 max-w-prose">{{ __('services.items.'.$slug.'.intro') }}</p>
                </div>

                <div class="rounded-panel bg-surface p-6 shadow-card sm:p-8">
                    <h2 class="text-card-title">{{ __('services.includes') }}</h2>
                    <ul class="mt-5 space-y-4">
                        @foreach (__('services.items.'.$slug.'.includes') as $item)
                            <li class="flex gap-3">
                                <x-icon name="check" class="mt-0.5 size-6 shrink-0 text-plum" />
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section pt-4 lg:pt-8" aria-labelledby="other-services">
        <div class="container-site">
            <h2 id="other-services" class="sr-only">{{ __('services.title') }}</h2>
            <ul class="flex flex-wrap gap-3">
                @foreach ($services as $other)
                    @continue($other === $slug)
                    <li>
                        <a href="{{ localized_route('services.show', ['slug' => $other]) }}"
                           class="inline-flex min-h-11 items-center rounded-control border border-line bg-surface px-4 font-medium text-plum hover:border-plum">
                            {{ __('services.items.'.$other.'.name') }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <x-cta-panel :title="__('services.cta.title')" :body="__('services.cta.body')" :button="__('services.cta.button')" />
</x-layout>
