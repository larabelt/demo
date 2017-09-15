<?php

namespace Belt\Core\Services;

use Belt\Core\Behaviors\HasConfig;
use Belt\Core\Behaviors\HasDisk;

/**
 * Class AutoLoaderService
 *
 * Generate VendorBelt classes that duplicate LaraBelt vendor files, which
 * can then be monkey-patched in the project root.
 *
 * @package Belt\Core\Services
 */
class AutoLoaderService
{

    use HasConfig, HasDisk;

    /**
     * @return string
     */
    public function configPath()
    {
        return 'belt.autoloader';
    }

    /**
     * Generate VendorBelt class and include it
     *
     * @return mixed
     */
    public function include($class)
    {
        if (!str_contains($class, 'VendorBelt')) {
            return;
        }

        $rel_path = $this->generate($class);

        if ($rel_path) {
            include(base_path($rel_path));
        }
    }

    /**
     * Generate VendorBelt class
     *
     * @return mixed
     */
    public function generate($class)
    {
        $contents = $this->read($class);

        return $this->write($class, $contents);
    }

    /**
     * Get contents of source vendor class
     *
     * @return mixed
     */
    public function read($class)
    {
        $bits = explode('\\', $class);

        $readPath = sprintf('%s/larabelt/%s/src/%s.php',
            $this->config('read', 'vendor'),
            strtolower($bits[1]),
            str_replace(['\\', 'VendorBelt/', $bits[1] . '/'], ['/', '', ''], $class)
        );

        return $this->disk()->get($readPath);
    }

    /**
     * Write VendorBelt class
     *
     * @return mixed
     */
    public function write($class, $contents)
    {
        $contents = str_replace('namespace Belt', 'namespace VendorBelt', $contents);

        $writePath = sprintf('%s/%s.php',
            $this->config('write', 'belt/vendor'),
            str_replace(['\\', 'VendorBelt/'], ['/', ''], $class)
        );

        $this->disk()->put($writePath, $contents);

        return $writePath;
    }

}