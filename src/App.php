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
    /**
     * The list of registered resources avaliables
     *
     * @var array
     */
    protected static $register = [];

    /**
     * Define a new avaliable resource
     *
     * @param  string $name    The name of the resource
     * @param  callable $creator The function to create the resource
     */
    public static function define($name, $creator)
    {
        return static::$register[$name] = $creator;
    }

    /**
     * Get the requested resource if exists
     *
     * @param  string $name The name of the resource
     * @return Return the requested resource
     */
    public static function get($name)
    {
        if (!array_key_exists($name, static::$register)) {
            throw new \Exception("The {$name} was not found on the Service Container!");
        }

        return static::$register[$name]();
    }
}
