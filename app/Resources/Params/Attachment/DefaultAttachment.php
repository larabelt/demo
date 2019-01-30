<?php

namespace App\Resources\Params\Attachment;

use App, Belt;

/**
 * Class DefaultAttachment
 * @package App\Resources\ParamGroups
 */
class DefaultAttachment extends Belt\Content\Resources\Params\BaseAttachment
{
    protected $key = 'attachments';
    protected $label = 'Cool Attachment';
    protected $description = 'Link existing attachment to this item.';
}