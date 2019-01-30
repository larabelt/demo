<?php

namespace App\Resources\Params\Lyst;

use App, Belt;

/**
 * Class ItineraryPreview
 * @package App\Resources\ParamGroups
 */
class ItineraryPreview extends Belt\Content\Resources\Params\BaseList
{
    protected $key = 'itinerary_preview';
    protected $label = 'Itinerary Preview';
    protected $description = 'Choose and itinerary to preview.';
}