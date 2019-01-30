<?php
namespace App\Resources\Params\Checkbox;

use App, Belt;

/**
 * Class DefaultCheckbox
 * @package App\Resources\Params\Checkbox
 */
class DefaultCheckbox extends Belt\Core\Resources\Params\Checkbox
{
    protected $key = 'default_checkbox';
    protected $label = 'Checkbox option';
    protected $description = 'Check to make true.';
    protected $type = 'psuedo-checkbox';
}