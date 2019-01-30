<?php

namespace App\Resources\Params\Editor;

use App, Belt;

/**
 * Class BodyEditor
 * @package App\Resources\Params\Text
 */
class BodyEditor extends App\Resources\Params\Editor\BaseEditor
{
    protected $key = 'body';
    protected $label = 'Body';
    protected $description = 'Enter the main content for this item.';
}