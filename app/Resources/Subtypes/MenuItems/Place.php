<?php

namespace App\Resources\Subtypes\MenuItems;

use App, Belt;

/**
 * Class Place
 * @package App\Resources\Subtypes\Places
 */
class Place extends App\Resources\Subtypes\MenuItems\BaseMenuItem
{
    protected $key = 'place';
    protected $label = 'Place';
    protected $description = '';
    protected $driver = Belt\Menu\Drivers\PlaceMenuDriver::class;
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