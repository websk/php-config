<?php

namespace WebSK\Config;

/**
 * Class ConfWrapper
 * @package WebSK\Config
 */
class ConfWrapper
{
    protected static array $config = [];

    /**
     * @param array $config
     * @return void
     */
    public static function setConfig(array $config): void
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
    public static function value(string $path, mixed $default = ''): mixed
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
                return $default;
            }
        }

        return $value;
    }
}
