<?php

namespace App\Forms\Contact;

use Belt;

/**
 * Class Template
 * @package App\Forms\Contact
 */
class Template extends Belt\Core\Forms\BaseForm
{
    /**
     * @var array
     */
    protected $attributes = [
        'name' => '',
        'email' => '',
        'comments' => '',
    ];

    /**
     * @var array
     */
    protected $rules = [
        'store' => [
            'name' => 'required',
            'email' => 'required|email',
            'comments' => 'required',
        ],
    ];

}