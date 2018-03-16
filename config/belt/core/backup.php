<?php

return [
    'defaults' => [
        'connection' => 'mysql',
        'disk' => 'local',
        //'path' => 'asdf',
    ],
    'groups' => [
        [
            'name' => 'main',
            'disk' => 's3',
            //'path' => '',
            'db' => '',
            'whitelist' => ['blocks', 'users'],
            //'blacklist' => ['blocks', 'users'],
            'expires' => [],
            'test' => function () {
                return 'hello';
            },
            'xpath' => function () {
                return 'world';
            }
        ],
    ],
];