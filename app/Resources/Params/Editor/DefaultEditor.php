<?php

namespace App\Resources\Params\Editor;

use App, Belt;

/**
 * Class DefaultEditor
 * @package App\Resources\Params\Text
 */
class DefaultEditor extends App\Resources\Params\Editor\BaseEditor
{
    protected $key = 'editor';
    protected $label = 'Content';
    protected $description = '';
}