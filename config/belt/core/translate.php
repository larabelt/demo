<?php

return [
    'auto-translate' => [
        'driver' => \Belt\Core\Services\TranslateService::class,
    ],
    'locales' => [
        ['code' => 'de_DE', 'label' => 'German'],
        ['code' => 'en_US', 'label' => 'English'],
        ['code' => 'es_ES', 'label' => 'Spanish'],
        ['code' => 'fr_FR', 'label' => 'French'],
    ],
];