<?php
declare(strict_types=1);

namespace Framework\Database;

/**
 * Model
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
abstract class Model
{
    protected $pdo;
    protected $sql;
    protected $where;
    protected $mysqlDatePattern = 'Y-m-d H:i:s';

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($parameters)
    {
        $parameters['created_at'] = date($this->mysqlDatePattern);
        $parameters['updated_at'] = date($this->mysqlDatePattern);

        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $this->table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);

            return $this->last()->get()[0];
        } catch (\PDOException $e) {
            throw new \Exception("Error on save the {$this->table} on the database!");
        }
    }

    public function last($order = 'id')
    {
        $this->select();
        $this->sql .= " ORDER BY {$order} DESC LIMIT 1";

        return $this;
    }

    public function get()
    {
        try {
            $statement = $this->pdo->prepare($this->sql);
            $statement->execute($this->where);

            return $statement->fetchAll(\PDO::FETCH_CLASS);
        } catch (\PDOException $e) {
            throw new \Exception("Error on fetch the {$this->table} from the database!");
        }
    }

    public function select()
    {
        $this->sql = sprintf(
            'SELECT * FROM %s',
            $this->table
        );

        return $this;
    }

    public function where($column, $value, $comparator = '=')
    {
        if (empty($this->sql)) {
            $this->select();
        }

        $this->sql .= sprintf(
            ' WHERE %s %s %s',
            $column,
            $comparator,
            ':' . $column
        );

        $this->where[$column] = $value;

        return $this;
    }

    public function andWhere($column, $value, $comparator = '=')
    {
        $this->sql .= sprintf(
            ' AND %s %s %s',
            $column,
            $comparator,
            ':' . $column
        );

        $this->where[$column] = $value;

        return $this;
    }
}
