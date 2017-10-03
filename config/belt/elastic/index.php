<?php

$host = env('ELASTIC_HOST');

return [
    'name' => env('ELASTIC_INDEX', false),
    'hosts' => $host ? [$host] : [],
    'types' => 'pages,places,events'
];