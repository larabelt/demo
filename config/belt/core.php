<?php

return [
    'index' => [
        'enabled' => env('INDEX_ENABLED', false),
    ],
    'teams' => [
        'allow_public_signup' => false,
        'send_welcome_email' => false,
    ],
    'users' => [
        'allow_public_signup' => false,
        'send_welcome_email' => false,
    ],
    'permissible' => [
        'available-roles' => [
            'admin',
            'editor' => 'do cool stuff',
        ],
        'available-abilities' => [
            'alerts',
            'users' => ['create', 'view', 'update'],
        ],
    ],

];