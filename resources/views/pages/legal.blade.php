<x-layout :title="__('legal.'.$page.'.title')" :description="__('legal.'.$page.'.title').' | '.config('site.name')">
    <section class="section">
        <div class="container-site">
            <h1 class="text-hero">{{ __('legal.'.$page.'.title') }}</h1>
            <p class="mt-4 text-ink-muted">{{ __('legal.updated', ['date' => __('legal.'.$page.'.updated_at')]) }}</p>

            <div class="mt-10 max-w-prose space-y-8">
                @foreach (__('legal.'.$page.'.sections') as $section)
                    <section>
                        <h2 class="text-card-title">{{ $section['heading'] }}</h2>
                        <p class="mt-3">{{ $section['body'] }}</p>
                    </section>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
