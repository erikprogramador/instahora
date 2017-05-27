<?php
declare(strict_types=1);

namespace Erik\Models;

use Erik\App;
use Erik\Models\User;
use Framework\Database\Model;

/**
 * Picture Model
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class Picture extends Model
{
    protected $table = 'pictures';
    protected $user;

    public function users()
    {
        $this->sql = sprintf(
            'SELECT %s FROM %s INNER JOIN %s ON %s = %s',
            $this->table . '.*, users.username',
            $this->table,
            'users',
            $this->table . '.users_id',
            'users.id'
        );

        return $this;
    }
}
