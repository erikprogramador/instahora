<?php

function dd($expression) {
    var_dump($expression);
    die();
}

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
