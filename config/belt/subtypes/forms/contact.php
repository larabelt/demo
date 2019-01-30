<?php

return [
    'extension' => \App\Forms\Contact\Template::class,
    'autoresponder' => [
        'from' => [
            'email' => env('FORMS_CONTACT_AUTORESPONDER_FROM_EMAIL', env('MAIL_FROM_ADDRESS')),
            'name' => env('FORMS_CONTACT_AUTORESPONDER_FROM_NAME', env('MAIL_FROM_NAME')),
        ]
    ],
];