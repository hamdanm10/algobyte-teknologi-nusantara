<x-layout :title="__('services.items.'.$slug.'.name')" :description="__('services.items.'.$slug.'.summary')">
    <section class="section relative overflow-hidden pb-10 pt-8 lg:pb-16 lg:pt-12">
        <div class="container-site">
            <a href="{{ localized_route('services') }}" class="link inline-block py-2 font-medium">{{ __('services.back') }}</a>
            <div class="mt-6 grid items-center gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:gap-16">
                <div>
                    <span class="flex size-14 items-center justify-center rounded-control bg-brand-soft text-plum">
                        <x-icon :name="$slug" class="size-7" />
                    </span>
                    <h1 class="text-hero mt-6">{{ __('services.items.'.$slug.'.name') }}</h1>
                    <p class="text-lead mt-6 max-w-prose">{{ __('services.items.'.$slug.'.intro') }}</p>
                </div>
                <div class="relative mx-auto w-full max-w-md lg:max-w-none">
                    <div class="bg-dots absolute -inset-3 rounded-panel bg-brand-soft" aria-hidden="true"></div>
                    <x-illustration :name="'service-'.$slug" ratio="4/3" size="1200×900" class="relative" eager />
                </div>
            </div>
        </div>
    </section>

    <section class="section pt-0 lg:pt-0">
        <div class="container-site">
            <div class="rounded-panel bg-surface p-6 shadow-card sm:p-10">
                <h2 class="text-card-title">{{ __('services.includes') }}</h2>
                <ul class="mt-6 grid gap-x-10 gap-y-4 sm:grid-cols-2">
                    @foreach (__('services.items.'.$slug.'.includes') as $item)
                        <li class="flex gap-3">
                            <x-icon name="check" class="mt-0.5 size-6 shrink-0 text-plum" />
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
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
