<?php

return [
    'mysql' => [
        'name' => env('database-name', 'default'),
        'username' => env('database-username', 'root'),
        'password' => env('database-password', 'root'),
        'connection' => 'mysql:host=' . env('database-host', '127.0.0.1'),
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
