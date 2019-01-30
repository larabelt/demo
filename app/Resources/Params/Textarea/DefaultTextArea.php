<?php

namespace App\Resources\Params\Textarea;

use App, Belt;

/**
 * Class DefaultTextArea
 * @package App\Resources\Params\Textarea
 */
class DefaultTextArea extends App\Resources\Params\Textarea\BaseTextArea
{
    protected $key = 'textarea';
    protected $label = 'Text Copy';
    protected $description = 'Enter general text.';
}