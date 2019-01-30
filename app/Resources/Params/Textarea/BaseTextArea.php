<?php

namespace App\Resources\Params\Textarea;

use App, Belt;

/**
 * Class BaseTextArea
 * @package App\Resources\Params\Textarea
 */
abstract class BaseTextArea extends Belt\Core\Resources\Params\TextArea
{
    protected $translatable = true;
}