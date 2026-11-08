@props(['title', 'body', 'button', 'href' => null])

<section class="section pt-0 lg:pt-0">
    <div class="container-site">
        <div class="rounded-panel bg-brand-soft px-6 py-12 sm:px-12 lg:py-16">
            <div class="max-w-2xl">
                <h2 class="text-section">{{ $title }}</h2>
                <p class="text-lead mt-4 max-w-prose">{{ $body }}</p>
                <x-button :href="$href ?? localized_route('contact')" class="mt-8">{{ $button }}</x-button>
            </div>
        </div>
    </div>
</section>
