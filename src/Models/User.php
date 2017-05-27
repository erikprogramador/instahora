<?php
declare(strict_types=1);

namespace Erik\Models;

use Framework\Database\Model;

/**
 * User Model
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class User extends Model
{
    protected $table = 'users';

    public $id;
    public $username;
    public $email;
    public $description;
    public $created_at;
    public $updated_at;
}
