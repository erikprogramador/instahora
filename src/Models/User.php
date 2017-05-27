<?php
declare(strict_types=1);

namespace Erik\Models;

use Erik\App;
use Erik\Models\Picture;
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

    public function pictures($username)
    {
        $user = $this->where('username', $username)->get()[0];
        $this->username = $user->username;
        $this->description = $user->description;
        $this->pictures = App::get(Picture::class)->where('users_id', $user->id)->get();

        return $this;
    }
}
