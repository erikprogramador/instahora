<?php
declare(strict_types=1);

namespace Framework\Security;

class Hash
{
    public static function password($password)
    {
        return password_hash($password, PASSWORD_DEFAULT, [
            'salt' => env('app-key', 'xxxxxxxxxxxx')
        ]);
    }
}
