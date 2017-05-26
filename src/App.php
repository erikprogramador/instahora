<?php
declare(strict_types=1);

namespace Erik;

/**
 * Application class
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class App
{
    protected static $register = [];

    public static function define($name, $creator)
    {
        return static::$register[$name] = $creator;
    }

    public static function get($name)
    {
        if (!array_key_exists($name, static::$register)) {
            throw new Exception("The {$name} was not found on the Service Container!");
        }

        return static::$register[$name]();
    }
}
