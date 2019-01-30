<?php

namespace App\Resources\Subtypes\Alerts;

use App, Belt;

/**
 * Class DefaultAlert
 * @package App\Resources\Subtypes\Places
 */
class DefaultAlert extends Belt\Content\Resources\Subtypes\BaseAttachment
{
    protected $key = 'default';
    protected $label = 'Default';
    protected $description = 'Default alert template';
    protected $translatable = ['name', 'intro', 'body'];

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\Params\Text\DefaultText::make('alert_url_text')
                ->setGroup('alert_url_extras')
                ->setLabel('Button text for url')
                ->setTranslatable(true),
            App\Resources\Params\DropDown\LinkTarget::make('alert_url_target')->setGroup('alert_url_extras'),
            App\Resources\Params\Checkbox\DefaultCheckbox::make('alert_dismiss_show')
                ->setGroup('dismiss_button')
                ->setLabel('Show button to dismiss instead of X'),
            App\Resources\Params\Text\DefaultText::make('alert_dismiss_text')
                ->setGroup('dismiss_button')
                ->setLabel('Dismiss button text')
                ->setTranslatable(true),
        ];
    }
}