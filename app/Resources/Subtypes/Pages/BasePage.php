<?php

namespace App\Resources\Subtypes\Pages;

use App, Belt;

/**
 * Class BasePage
 * @package App\Resources\Subtypes\Places
 */
abstract class BasePage extends Belt\Content\Resources\Subtypes\BasePage
{
    /**
     * @var array
     */
    protected $translatable = ['name', 'slug', 'meta_title', 'meta_description', 'meta_keywords'];
}