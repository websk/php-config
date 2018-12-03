<?php

namespace WebSK\Config;

/**
 * Class ConfWrapper
 * @package WebSK\Config
 */
class ConfWrapper
{
    protected static $config = [];

    /**
     * @param $config
     */
    public static function setConfig($config)
    {
        self::$config = $config;
    }

    /**
     * Get value an array by using "root.branch.leaf" notation
     *
     * @param string $path Path to a specific option to extract
     * @param mixed $default Value to use if the path was not found
     * @return mixed
     */
    public static function value($path, $default = '')
    {
        if (empty($path)) {
            return '';
        }

        $value = self::$config;

        $parts = explode(".", $path);

        foreach ($parts as $part) {
            if (array_key_exists($part, $value)) {
                $value = $value[$part];
            } else {
                // key doesn't exist, fail
                return $default;
            }
        }

        return $value;
    }
}
