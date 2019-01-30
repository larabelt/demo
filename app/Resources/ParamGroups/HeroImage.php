<?php

namespace App\Resources\ParamGroups;

use App, Belt;

/**
 * Class HeroImage
 * @package App\Resources\ParamGroups
 */
class HeroImage extends BaseParamGroup
{
    protected $key = 'hero_image';
    protected $label = 'Main Image';
    protected $description = 'Set main image to appear at top of page.';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\Params\Attachment\HeroAttachment::make(),
            App\Resources\Params\Text\DefaultText::make(),
        ];
    }

}