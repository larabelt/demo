<?php

namespace App\Resources\Subtypes\MenuItems;

use App, Belt;

/**
 * Class BaseMenuItem
 * @package App\Resources\Subtypes\Places
 */
class BaseMenuItem extends Belt\Menu\Resources\Subtypes\BaseMenuItem
{
    protected $translatable = ['label'];

}