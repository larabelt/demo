<?php

namespace App\Resources\Subtypes\Terms;

use App, Belt;

/**
 * Class DefaultTerm
 * @package App\Resources\Subtypes\Places
 */
class DefaultTerm extends Belt\Content\Resources\Subtypes\BaseTerm
{
    protected $key = 'default';
    protected $label = 'Default';
    protected $description = '';
    protected $path = 'belt-content::terms.subtypes.default';
}