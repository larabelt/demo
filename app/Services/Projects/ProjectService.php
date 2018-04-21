<?php

namespace App\Services\Projects;

use App, Belt;

class ProjectService
{

    /**
     * @var ProjectFactory
     */
    protected $factory;

    /**
     * ProjectService constructor.
     */
    public function __construct()
    {
        $this->factory = new ProjectFactory();
    }

    /**
     * @param $projectKey
     * @return App\Project
     */
    public function getProject($projectKey)
    {
        return $this->factory->get($projectKey);
    }

    /**
     * @param $projectKey
     * @param $packageKey
     * @return mixed
     */
    public function getPackage($projectKey, $packageKey)
    {
        $project = $this->getProject($projectKey);

        return $project->packages->get($packageKey);
    }

}