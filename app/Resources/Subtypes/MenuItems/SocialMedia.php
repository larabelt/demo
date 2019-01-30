<?php

namespace App\Resources\Subtypes\MenuItems;

use App, Belt;

/**
 * Class SocialMedia
 * @package App\Resources\Subtypes\Social medias
 */
class SocialMedia extends App\Resources\Subtypes\MenuItems\BaseMenuItem
{
    protected $key = 'social-media';
    protected $label = 'Social Media';
    protected $description = '';
    //protected $driver = App\Menu\Drivers\SocialMediaMenuDriver::class;
    protected $display = ['url', 'label'];

    /**
     * @return array
     */
    public function params()
    {
        return [

        ];
    }

}