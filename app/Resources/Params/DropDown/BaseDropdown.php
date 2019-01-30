<?php
namespace App\Resources\Params\DropDown;

use App, Belt;

/**
 * Class BaseDropdown
 * @package App\Resources\Params\Checkbox
 */
abstract class BaseDropdown extends Belt\Core\Resources\Params\DropDown
{
    protected $label = '';
    protected $description = '';
}