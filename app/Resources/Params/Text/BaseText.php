<?php

namespace App\Resources\Params\Text;

use App, Belt;

/**
 * Class BaseText
 * @package App\Resources\Params\Text
 */
abstract class BaseText extends Belt\Core\Resources\Params\Text
{
    protected $translatable = false;
}