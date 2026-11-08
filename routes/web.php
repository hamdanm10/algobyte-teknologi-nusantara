<?php

declare(strict_types=1);

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Every page is registered once per locale: "/" for the default one, "/{locale}" for the others.
// Route names are "{key}.{locale}" and slugs come from lang/{locale}/routes.php.
foreach (config('site.locales') as $locale) {
    $prefix = $locale === config('site.default_locale') ? '' : $locale;
    $slug = fn (string $key): string => trans('routes.'.$key, [], $locale);

    Route::prefix($prefix)->group(function () use ($locale, $slug): void {
        Route::get('/', [PageController::class, 'home'])->name('home.'.$locale);

        Route::get($slug('services'), [ServiceController::class, 'index'])->name('services.'.$locale);
        Route::get($slug('services').'/{slug}', [ServiceController::class, 'show'])->name('services.show.'.$locale);

        Route::get($slug('projects'), [ProjectController::class, 'index'])->name('projects.'.$locale);

        Route::get($slug('about'), [PageController::class, 'about'])->name('about.'.$locale);

        Route::get($slug('contact'), [ContactController::class, 'show'])->name('contact.'.$locale);
        Route::post($slug('contact'), [ContactController::class, 'store'])
            ->middleware('throttle:contact')
            ->name('contact.store.'.$locale);

        Route::get($slug('privacy'), [PageController::class, 'privacy'])->name('privacy.'.$locale);
        Route::get($slug('terms'), [PageController::class, 'terms'])->name('terms.'.$locale);
    });
}
