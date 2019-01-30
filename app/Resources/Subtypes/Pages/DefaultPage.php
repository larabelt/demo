<?php

namespace App\Resources\Subtypes\Pages;

use App, Belt;

/**
 * Class DefaultPage
 * @package App\Resources\Subtypes\Places
 */
class DefaultPage extends App\Resources\Subtypes\Pages\BasePage
{
    protected $key = 'default';
    protected $label = 'Default';
    protected $description = '';
    protected $extends = 'belt-content::pages.web.show';
    protected $path = 'belt-content::pages.subtypes.default';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\ParamGroups\HeroImage::make(),
            App\Resources\Params\Editor\BodyEditor::make()->setGroup('body')->setTranslatable(true),
        ];
    }

}