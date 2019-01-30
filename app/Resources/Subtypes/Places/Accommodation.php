<?php

namespace App\Resources\Subtypes\Places;

use App, Belt;

/**
 * Class Accommodation
 * @package App\Resources\Subtypes\Places
 */
class Accommodation extends App\Resources\Subtypes\Places\BasePlace
{
    protected $key = 'accommodation';
    protected $label = 'Accommodation';
    protected $description = '';
    protected $extends = 'places.web.show';
    protected $path = 'places.subtypes.accommodation';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\ParamGroups\HeroImage::make(),
            App\Resources\Params\Textarea\IntroCopy::make(),
            App\Resources\Params\Editor\BodyEditor::make(),
            App\Resources\ParamGroups\AccommodationDetail::make(),
            App\Resources\ParamGroups\IslandMap::make(),
            App\Resources\Params\Block\BigImageToutLink::make()->setGroup('big_image_link'),
            App\Resources\Params\DropDown\CandidTag::make()->setGroup('candid_tag'),
        ];
    }

}