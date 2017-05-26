<?php
declare(strict_types=1);

namespace Framework\Database;

use PDO;
use PDOException;

/**
 * Connection
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class Connection
{
    /**
     * Connect to the database
     *
     * @param  array $config The array with the configuration to connect
     * @return PDO         The connection with the database
     */
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
