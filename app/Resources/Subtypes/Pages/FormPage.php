<?php

namespace App\Resources\Subtypes\Pages;

use App, Belt;

/**
 * Class FormPage
 * @package App\Resources\Subtypes\Places
 */
class FormPage extends App\Resources\Subtypes\Pages\BasePage
{
    protected $key = 'form';
    protected $label = 'Form';
    protected $description = '';
    protected $extends = 'belt-content::pages.web.show';
    protected $path = 'belt-content::pages.subtypes.form';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\ParamGroups\Form::make(),
            App\Resources\ParamGroups\Headings::make(),
            App\Resources\Params\Editor\BodyEditor::make()->setGroup('body')->setTranslatable(true),
        ];
    }

}