<?php

return [
    'mysql' => [
        'database' => env('database-name', 'default'),
        'username' => env('database-username', 'root'),
        'password' => env('database-password', 'root'),
        'connection' => 'mysql:host=' . env('database-host', '127.0.0.1'),
        'port' => env('database-port', '3306'),
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]
    ]
];
