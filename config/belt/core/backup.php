<?php

return [
    'defaults' => [
        'connection' => 'mysql',
        'disk' => 'local',
        'path' => '',
    ],
    'groups' => [
        [
            'disk' => 's3',
            'path' => '',
            'db' => '',
            'whitelist' => ['blocks', 'users'],
//            'blacklist' => ['blocks', 'users'],
            'expires' => [],
        ],
    ],
];