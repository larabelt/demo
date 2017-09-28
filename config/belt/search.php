<?php

return [
    'classes' => [
        \Belt\Content\Page::class => \Belt\Content\Http\Requests\PaginatePages::class,
        \Belt\Spot\Place::class => \Belt\Spot\Http\Requests\PaginatePlaces::class,
    ]
];