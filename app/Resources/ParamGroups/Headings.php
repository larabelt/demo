<?php

namespace App\Resources\ParamGroups;

use App, Belt;

/**
 * Class Heading
 * @package App\Resources\ParamGroups
 */
class Headings extends BaseParamGroup
{
    protected $key = 'headings';
    protected $label = 'Headings';
    protected $description = 'Set page headings';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\Params\Text\DefaultText::make('heading')->setLabel('Main Heading')->setTranslatable(true),
            App\Resources\Params\Text\DefaultText::make('subheading')->setLabel('Sub Heading')->setTranslatable(true),
        ];
    }

}