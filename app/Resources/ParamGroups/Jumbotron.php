<?php

namespace App\Resources\ParamGroups;

use App, Belt;

/**
 * Class Jumbotron
 * @package App\Resources\ParamGroups
 */
class Jumbotron extends BaseParamGroup
{
    protected $key = 'jumbotron';
    protected $label = 'Jumbotron';
    protected $description = 'Set main image and / or text to appear at top of page.';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\Params\Checkbox\DefaultCheckbox::make('jumbotron_enabled')
                ->setLabel('Enable Jumbotron')
                ->setDescription(''),
            App\Resources\Params\Attachment\DefaultAttachment::make('jumbotron_image')
                ->setLabel('Image')
                ->setDescription('Add an image to be the Jumbotron\'s background'),
            App\Resources\Params\Text\DefaultText::make(),
        ];
    }

}