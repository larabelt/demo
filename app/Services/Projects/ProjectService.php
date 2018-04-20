<?php

namespace App\Services\Projects;

use App, Belt;

class ProjectService
{

    use Belt\Core\Behaviors\HasConfig;

    /**
     * ProjectService constructor.
     */
    public function __construct()
    {
        $this->configPath = 'projects';
    }

    /**
     * @return string
     */
    public function configPath()
    {
        return $this->configPath;
    }

    public function setProject($key)
    {
        $this->configPath = "projects.$key";

        $this->setConfig();
    }

}