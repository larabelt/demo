<?php

namespace App\Resources\Subtypes\MenuItems;

use App, Belt;

/**
 * Class Lyst
 * @package App\Resources\Subtypes\Places
 */
class Lyst extends App\Resources\Subtypes\MenuItems\BaseMenuItem
{
    protected $key = 'list';
    protected $label = 'List';
    protected $description = '';
    protected $driver = Belt\Menu\Drivers\ListMenuDriver::class;
    protected $display = ['label'];

    /**
     * @return array
     */
    public function params()
    {
        return [

        ];
    }

}