<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Routing\Route;

/**
 * Builds locale-aware URLs. Routes are named "{key}.{locale}" (for example "services.en").
 */
final class LocalizedUrl
{
    public static function to(string $key, array $parameters = [], ?string $locale = null): string
    {
        return route($key.'.'.($locale ?? app()->getLocale()), $parameters);
    }

    /**
     * URLs of the current page in every locale, keyed by locale. Empty when the route is not localized.
     *
     * @return array<string, string>
     */
    public static function alternates(?Route $route): array
    {
        $name = $route?->getName();

        if ($name === null || ! str_contains($name, '.')) {
            return [];
        }

        [$key, $current] = [substr($name, 0, (int) strrpos($name, '.')), substr($name, (int) strrpos($name, '.') + 1)];

        if (! in_array($current, config('site.locales'), true)) {
            return [];
        }

        $alternates = [];

        foreach (config('site.locales') as $locale) {
            $alternates[$locale] = route($key.'.'.$locale, $route->parameters());
        }

        return $alternates;
    }
}
