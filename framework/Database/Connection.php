<?php
declare(strict_types=1);

namespace Framework\Database;

use PDO;
use PDOException;

class Connection
{
    public static function connect($config)
    {
        try {
            return new PDO(
                $config['connection'] . ';port=' . $config['port'] . ';dbname=' . $config['database'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }
}
