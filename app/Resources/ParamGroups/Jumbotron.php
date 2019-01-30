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
                ->setDescription(''),
            App\Resources\Params\Text\DefaultText::make('jumbotron_title')
                ->setLabel('Title')
                ->setDescription('')
                ->setTranslatable(true),
            App\Resources\Params\Text\DefaultText::make('jumbotron_text')
                ->setLabel('Text')
                ->setDescription('')
                ->setTranslatable(true),
            App\Resources\Params\Text\Url::make('jumbotron_button_url')
                ->setLabel('Button Url')
                ->setDescription('Add Linkable Button Url'),
            App\Resources\Params\Text\DefaultText::make('jumbotron_button_text')
                ->setLabel('Button Text')
                ->setDescription('Set Linkable Button Text')
                ->setTranslatable(true),
        ];
    }

}