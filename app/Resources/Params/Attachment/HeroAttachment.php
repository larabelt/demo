<?php

namespace App\Resources\Params\Attachment;

use App, Belt;

/**
 * Class HeroAttachment
 * @package App\Resources\ParamGroups
 */
class HeroAttachment extends Belt\Content\Resources\Params\BaseAttachment
{
    protected $key = 'hero';
    protected $label = 'Hero Image';
    protected $description = 'Hero image at top of page.';
}