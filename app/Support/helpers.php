<?php

declare(strict_types=1);

use App\Support\LocalizedUrl;

if (! function_exists('localized_route')) {
    function localized_route(string $key, array $parameters = [], ?string $locale = null): string
    {
        return LocalizedUrl::to($key, $parameters, $locale);
    }
}
