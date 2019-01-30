<?php

namespace App\Resources\Subtypes\Events;

use App, Belt;

/**
 * Class DefaultEvent
 * @package App\Resources\Subtypes\Events
 */
class DefaultEvent extends Belt\Spot\Resources\Subtypes\BaseEvent
{
    protected $key = 'default';
    protected $label = 'Default';
    protected $description = '';
    protected $extends = 'events.web.show';
    protected $path = 'events.subtypes.default';
    protected $translatable = ['name', 'slug', 'meta_title', 'meta_description', 'meta_keywords'];

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\Params\Text\Heading::make(),
            App\Resources\Params\Text\EventDateInfo::make(),
            App\Resources\Params\Editor\BodyEditor::make(),
            App\Resources\Params\Block\BigImageToutLink::make()->setGroup('big_image_link'),
            App\Resources\Params\DropDown\CandidTag::make()->setGroup('candid_tag'),
        ];
    }

}