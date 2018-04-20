<?php

namespace App\Services\Projects;

use App, Belt;

abstract class BaseService
{
    use Belt\Core\Behaviors\HasConfig;

    /**
     * @var array
     */
    protected $keys = [];

    //abstract public function getConfigKey();

    /**
     * @param $keys
     * @return $this
     */
    public function setKeys($keys)
    {
        foreach ($keys as $key => $value) {
            $this->setKey($key, $value);
        }

        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function setKey($key, $value)
    {
        $this->keys[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return string
     */
    public function getKey($key)
    {
        return array_get($this->keys, $key);
    }

    public function getPath($path, $basePath = null)
    {
        if (substr($path, 0, 1) === '/') {
            return $path;
        }
    }

}