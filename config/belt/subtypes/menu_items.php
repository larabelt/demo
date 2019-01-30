<?php

return [
    'default' => App\Resources\Subtypes\MenuItems\DefaultMenuItem::make()->toArray(),
    'list' => App\Resources\Subtypes\MenuItems\Lyst::make()->toArray(),
    'page' => App\Resources\Subtypes\MenuItems\Page::make()->toArray(),
    'place' => App\Resources\Subtypes\MenuItems\Place::make()->toArray(),
    'social_media' => App\Resources\Subtypes\MenuItems\SocialMedia::make()->toArray(),
];