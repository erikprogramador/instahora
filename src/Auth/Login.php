<?php
declare(strict_types=1);

namespace Erik\Auth;

use Framework\Http\Request;

class Login implements Auth
{
    /**
     * Authenticate the user
     */
    public function authenticate(Request $request)
    {

    }

    /**
     * Register the user
     */
    public function register(Request $request)
    {

    }

    /**
     * Check if has a user logged
     *
     * @return boolean True if has a user logged
     */
    public function check()
    {
        return session('user') ?? false;
    }
}
