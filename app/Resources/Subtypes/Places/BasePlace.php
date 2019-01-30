<?php

namespace App\Resources\Subtypes\Places;

use App, Belt;

/**
 * Class BasePlace
 * @package App\Resources\Subtypes\Places
 */
class BasePlace extends Belt\Spot\Resources\Subtypes\BasePlace
{
    /**
     * @var array
     */
    protected $translatable = ['name', 'slug', 'meta_title', 'meta_description', 'meta_keywords'];
}