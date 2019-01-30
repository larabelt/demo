<?php

namespace App\Resources\Params\Text;

use App, Belt;

/**
 * Class Url
 * @package App\Resources\Params\Text
 */
class Url extends App\Resources\Params\Text\BaseText
{
    protected $key = 'url';
    protected $label = 'Link';
    protected $description = 'Enter link.';
}