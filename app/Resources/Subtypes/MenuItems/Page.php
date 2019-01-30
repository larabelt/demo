<?php

namespace App\Resources\Subtypes\MenuItems;

use App, Belt;

/**
 * Class Page
 * @package App\Resources\Subtypes\Places
 */
class Page extends App\Resources\Subtypes\MenuItems\BaseMenuItem
{
    protected $key = 'page';
    protected $label = 'Page';
    protected $description = '';
    protected $driver = Belt\Menu\Drivers\PageMenuDriver::class;
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