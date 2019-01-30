<?php

namespace App\Resources\Subtypes\Lists;

use App, Belt;

/**
 * Class Itinerary
 * @package App\Resources\Subtypes\Places
 */
class Itinerary extends App\Resources\Subtypes\Lists\BaseList
{
    protected $key = 'itinerary';
    protected $label = 'Itinerary';
    protected $description = '';
    protected $extends = 'lists.web.show';
    protected $path = 'lists.subtypes.itinerary';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\ParamGroups\HeroImageBodyCopy::make(),
            App\Resources\Params\Textarea\IntroCopy::make()->setGroup('intro'),
            App\Resources\Params\DropDown\CandidTag::make()->setGroup('candid_tag'),
        ];
    }

}