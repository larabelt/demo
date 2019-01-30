<?php

namespace App\Resources\Subtypes\MenuItems;

use App, Belt;

/**
 * Class DefaultMenuItem
 * @package App\Resources\Subtypes\Places
 */
class DefaultMenuItem extends App\Resources\Subtypes\MenuItems\BaseMenuItem
{
    protected $key = 'default';
    protected $label = 'Default';
    protected $description = '';
    protected $driver = Belt\Menu\Drivers\DefaultMenuDriver::class;
    protected $display = ['url', 'target', 'label'];

}