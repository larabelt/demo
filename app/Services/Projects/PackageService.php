<?php

namespace App\Services\Projects;

use App, Belt;

class PackageService extends BaseService
{
    /**
     * @return string
     */
    public function configPath()
    {
        return sprintf('projects.%s.packages.%s.%s',
            $this->getKey('project'),
            $this->getKey('owner'),
            $this->getKey('package')
        );
    }

    /**
     * @param array $config
     * @return array
     */
    public function toArray()
    {
        $this->setConfig(config($this->configPath()));

        return [
            'meta' => $this->metaToArray(),
        ];
    }

    /**
     * @return array
     */
    public function metaToArray()
    {
        return [
            'name' => $this->config('meta.name'),
            'path' => $this->config('meta.path'),
            'foo' => $this->config('meta.path'),
        ];
    }

    public function getPath($path, $basePath = null)
    {
        if (substr($path, 0, 1) === '/') {
            return $path;
        }
    }

}