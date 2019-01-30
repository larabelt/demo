<?php

namespace App\Resources\Params\DropDown;

use App, Belt;

/**
 * Class FormDropdown
 * @package App\Resources\Params\Dropdown
 */
class FormDropdown extends BaseDropdown
{
    protected $key = 'form';
    protected $label = 'Form';
    protected $description = '';
    protected $options = [
        '' => 'No Form',
        'form-contact' => 'Contact Form',
    ];

}