<?php

return [
    'prefix-urls' => true,
    'auto-translate' => [
        'driver' => \Belt\Core\Services\AutoTranslate\AWSAutoTranslate::class,
    ],
    'locales' => [
        ['code' => 'en', 'label' => 'English'],
        ['code' => 'fr', 'label' => 'Francais'],
        ['code' => 'es', 'label' => 'Español'],
    ],
];