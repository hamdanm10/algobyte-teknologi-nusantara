<x-layout :title="__('contact.title')" :description="__('contact.lead')">
    <section class="section pb-8 lg:pb-12">
        <div class="container-site">
            <x-section-heading :title="__('contact.title')" :lead="__('contact.lead')" :level="1" />
        </div>
    </section>

    <section class="section pt-0 lg:pt-0" id="form">
        <div class="container-site">
            <div class="max-w-2xl">
                @if (session('sent'))
                    <div role="status" class="rounded-panel bg-brand-soft p-6 sm:p-8">
                        <h2 class="text-card-title">{{ __('contact.sent.title') }}</h2>
                        <p class="mt-2">{{ __('contact.sent.body') }}</p>
                    </div>
                @else
                    <form method="POST" action="{{ localized_route('contact.store') }}" class="rounded-panel bg-surface p-6 shadow-card sm:p-8" novalidate>
                        @csrf

                        @if ($errors->any())
                            <div role="alert" class="mb-6 rounded-control border-l-4 border-accent bg-brand-soft p-4">
                                <p class="font-semibold">{{ __('contact.errors_title') }}</p>
                                <ul class="mt-2 list-disc space-y-1 pl-5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Honeypot: hidden from people, filled by bots. --}}
                        <div class="absolute -left-[9999px]" aria-hidden="true">
                            <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off" value=""></label>
                        </div>

                        <div class="space-y-6">
                            @php
                                $input = 'mt-2 block w-full rounded-control border border-ink-muted/70 bg-surface px-4 py-3 text-ink placeholder:text-ink-muted focus:border-accent focus:outline-2 focus:outline-accent aria-[invalid=true]:border-accent';
                            @endphp

                            <div>
                                <label for="name" class="font-medium">{{ __('contact.fields.name') }}</label>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" required maxlength="120" autocomplete="name"
                                       @error('name') aria-invalid="true" aria-describedby="name-error" @enderror class="{{ $input }}">
                                @error('name')<p id="name-error" class="mt-2 text-sm text-accent">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="email" class="font-medium">{{ __('contact.fields.email') }}</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required maxlength="190" autocomplete="email"
                                       @error('email') aria-invalid="true" aria-describedby="email-error" @enderror class="{{ $input }}">
                                @error('email')<p id="email-error" class="mt-2 text-sm text-accent">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="company" class="font-medium">
                                    {{ __('contact.fields.company') }} <span class="font-normal text-ink-muted">({{ __('contact.optional') }})</span>
                                </label>
                                <input id="company" name="company" type="text" value="{{ old('company') }}" maxlength="120" autocomplete="organization"
                                       @error('company') aria-invalid="true" aria-describedby="company-error" @enderror class="{{ $input }}">
                                @error('company')<p id="company-error" class="mt-2 text-sm text-accent">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="message" class="font-medium">{{ __('contact.fields.message') }}</label>
                                <textarea id="message" name="message" rows="6" required minlength="10" maxlength="2000"
                                          placeholder="{{ __('contact.placeholders.message') }}"
                                          @error('message') aria-invalid="true" aria-describedby="message-error" @enderror class="{{ $input }}">{{ old('message') }}</textarea>
                                @error('message')<p id="message-error" class="mt-2 text-sm text-accent">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-4">
                            <x-button type="submit">{{ __('contact.submit') }}</x-button>
                            <p class="text-sm text-ink-muted">
                                {{ __('contact.privacy') }}
                                <a href="{{ localized_route('privacy') }}" class="link">{{ __('contact.privacy_link') }}</a>
                            </p>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </section>
</x-layout>
