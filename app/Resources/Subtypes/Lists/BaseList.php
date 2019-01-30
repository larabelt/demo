<?php

namespace App\Resources\Subtypes\Lists;

use App, Belt;

/**
 * Class BaseList
 * @package App\Resources\Subtypes\Lists
 */
class BaseList extends Belt\Content\Resources\Subtypes\BaseList
{
    protected $translatable = ['name', 'slug', 'meta_title', 'meta_description', 'meta_keywords'];
}