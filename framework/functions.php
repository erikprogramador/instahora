<?php

use Erik\App;
use Erik\Auth\Auth;
use Facebook\Facebook;

/**
 * Vardump and die a value
 *
 * @param  mixed $expression The value to be dumped
 */
function dd($expression) {
    var_dump($expression);
    die();
}

/**
 * Get the requested variable from environment file
 *
 * @param  string $variable The variable to be search
 * @param  string|null $default  Default variable if the requested don't exists
 * @return string           The value of the requested variable
 */
function env($variable, $default = null) {
    if (!file_exists($envPath = __DIR__ . '/../environment.php')) {
        throw new Exception("Create a new environment file using de example to run the application!");
    }

    $envFile = require $envPath;

    if (!array_key_exists($variable, $envFile)) {
        return $default;
    }

    return $envFile[$variable];
}

/**
 * Get configuration from a config file
 *
 * @param  string $file The name of the file
 * @param  string $key  The to be search on the file
 * @return mixed       Returns the key value of the file
 */
function config($file, $key) {
    if (!file_exists($filePath = __DIR__ . "/../config/{$file}.php")) {
        throw new Exception("The file {$file} don't exists!");
    }

    $configFile = require $filePath;

    if (!array_key_exists($key, $configFile)) {
        throw new Exception("The config file don't contains the key {$key}!");
    }

    return $configFile[$key];
}

/**
 * Include a view inside another view
 *
 * @param  string $view The view name to be loaded
 */
function includeView($view) {
    if (!file_exists($viewPath = __DIR__ . '/../resources/views/' . $view . '.view.php')) {
        throw new Exception("View not found on the path {$viewPath}");
    }

    return require_once $viewPath;
}

/**
 * Set or get a session variable
 *
 * @param  string $key   The session key
 * @param  string|null $value The value to associate
 * @return mixed        The value of the session
 */
function session($key, $value = null) {
    if (!is_null($value)) {
        $_SESSION[$key] = $value;
        return $_SESSION[$key];
    }

    if (!array_key_exists($key, $_SESSION)) {
        return null;
    }

    return $_SESSION[$key];
}

/**
 * Return the auth instance
 *
 * @return Auth Auth instance
 */
function auth() {
    return App::get(Auth::class);
}
