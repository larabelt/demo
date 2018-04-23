<?php

namespace App;

use App, Belt;
use Belt\Core\Helpers\UrlHelper;

/**
 * Class Package
 * @package Belt\Spot
 */
class Package extends Model
{

    /**
     * @var Project
     */
    protected $project;

    /**
     * @param $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }

    /**
     * @param $path
     * @return string
     */
    public function getPathAttribute($path)
    {
        if (substr($path, 0, 1) !== '/') {
            $patterns = ['~/{2,}~', '~/(\./)+~', '~([^/\.]+/(?R)*\.{2,}/)~', '~\.\./~'];
            $replacements = ['/', '/', '', ''];
            return preg_replace($patterns, $replacements, "{$this->project->path}/$path");
        }

        return $path;
    }

}