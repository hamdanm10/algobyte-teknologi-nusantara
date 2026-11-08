@props(['title', 'body', 'button', 'href' => null])

<section class="section pt-0 lg:pt-0">
    <div class="container-site">
        <div class="bg-dots-ink overflow-hidden rounded-panel bg-brand">
            <div class="grid items-center gap-8 px-6 py-12 sm:px-12 lg:grid-cols-[1.2fr_0.8fr] lg:gap-12 lg:py-0">
                <div class="lg:py-16">
                    <h2 class="text-section max-w-xl">{{ $title }}</h2>
                    <p class="mt-4 max-w-prose text-lg text-ink">{{ $body }}</p>
                    <x-button :href="$href ?? localized_route('contact')" variant="dark" class="mt-8">{{ $button }}</x-button>
                </div>
                <div class="mx-auto w-full max-w-xs lg:max-w-none lg:self-end lg:pt-10">
                    <x-illustration name="cta" ratio="1/1" size="800×800" />
                </div>
            </div>
        </div>
    </div>
</section>
