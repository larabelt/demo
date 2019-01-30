<?php

namespace App\Resources\ParamGroups;

use App, Belt;

/**
 * Class BaseParamGroup
 * @package App\Resources\ParamGroups
 */
abstract class BaseParamGroup extends Belt\Core\Resources\BaseParamGroup
{
    /**
     * @var mixed
     */
    protected $prefix = false;

}