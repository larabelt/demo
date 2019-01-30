<?php

namespace App\Resources\Subtypes\Attachments;

use App, Belt;

/**
 * Class DefaultAttachment
 * @package App\Resources\Subtypes\Places
 */
class DefaultAttachment extends Belt\Content\Resources\Subtypes\BaseAttachment
{
    protected $key = 'default';
    protected $label = 'Default';
    protected $description = '';
    protected $preview = 'belt-content::sections.previews.default';
    protected $translatable = ['alt'];
}