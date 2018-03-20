<?php

return [
    'defaults' => [
        'connectionName' => 'mysql',
        'disk' => 'local',
        'relPath' => 'backups',
    ],
    'groups' => [
        'default' => [
            'disk' => 'local',
            'expires' => '60',
//            'relPath' => function () {
//                return 'world';
//            }
            //'exclude' => ['blocks', 'users'],
            //'include' => ['blocks', 'users'],
            'relPath' => 'aaabackups/default',
        ],
    ],
];