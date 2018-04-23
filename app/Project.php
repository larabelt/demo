<?php

namespace App;

use App, Belt;
use Illuminate\Support\Collection;

/**
 * Class Project
 * @package Belt\Spot
 */
class Project extends Model
{

    /**
     * @var Collection
     */
    public $packages;

    /**
     * Project constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->packages = collect();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();
        $array['packages'] = $this->packages->toArray();

        return $array;
    }


}