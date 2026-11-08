<?php

declare(strict_types=1);

return [
    'name' => 'Algobyte Teknologi Nusantara',

    // The default locale is served at "/", every other locale under "/{locale}".
    'default_locale' => 'id',
    'locales' => ['id', 'en'],

    // Slugs are shared by all locales; the text lives in lang/{locale}/services.php.
    'services' => ['web-development', 'mobile-apps', 'custom-systems', 'maintenance-support'],
];
