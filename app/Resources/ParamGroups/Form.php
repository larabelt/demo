<?php

namespace App\Resources\ParamGroups;

use App, Belt;

/**
 * Class Form
 * @package App\Resources\ParamGroups
 */
class Form extends BaseParamGroup
{
    protected $key = 'form';
    protected $label = 'Form';
    protected $description = 'Configure form';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\Params\DropDown\FormDropdown::make('form_key'),
            App\Resources\Params\Text\DefaultText::make('form_title')
                ->setLabel('Title')
                ->setDescription('')
                ->setTranslatable(true),
            App\Resources\Params\Text\DefaultText::make('form_success')
                ->setLabel('Success Text')
                ->setDescription('Message to display when form is successfully submitted')
                ->setTranslatable(true),
        ];
    }

}