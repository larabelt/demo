<?php

namespace App;

use App, Belt;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * @package Belt\Spot
 */
class Project extends Model
{
    /**
     * @var string
     */
    protected $morphClass = 'projects';

    /**
     * @var string
     */
    protected $table = 'projects';

    /**
     * @var array
     */
    protected $guarded = ['id'];

}