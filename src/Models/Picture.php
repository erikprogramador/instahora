<?php
declare(strict_types=1);

namespace Erik\Models;

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

    public $id;
    public $path;
    public $description;
    public $user_id;
    public $created_at;
    public $updated_at;
}
