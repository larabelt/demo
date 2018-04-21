<?php

namespace App\Services\Projects;

use App, Belt;
use App\Package;
use App\Project;

class ProjectFactory
{

    /**
     * @param $key
     * @return Project
     */
    public function get($key)
    {
        $projectConfig = config("projects.$key", []);

        $project = new Project(array_get($projectConfig, 'meta', []));

        foreach (array_get($projectConfig, 'packages', []) as $packageKey => $packageConfig) {
            $project->packages->put($packageKey, array_get($packageConfig, 'meta', []));
        }

        return $project;
    }

}