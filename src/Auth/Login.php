<?php
declare(strict_types=1);

namespace Erik\Auth;

use Erik\App;
use Erik\Models\User;
use Framework\Http\Request;
use Framework\Security\Hash;

class Login implements Auth
{
    /**
     * Authenticate the user
     */
    public function authenticate(Request $request)
    {
        $this->authenticateValidate($request->get());

        $user = App::get(User::class)
            ->where('username', $request->get('username'))
            ->andWhere('password', Hash::password($request->get('password')))
            ->get();

        if (count($user) <= 0) {
            throw new \Exception("The username or password don't exists!");
        }

        $user['password'] = null;

        session('user', $user[0]);
        return $user;
    }

    /**
     * Register the user
     */
    public function register(Request $request)
    {
        $this->registerValidate($request->get());

        try {
            return App::get(StoreUser::class)->proccess($request->get());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
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

    protected function registerValidate($data)
    {
        return true;
    }

    protected function authenticateValidate($data)
    {
        return true;
    }
}
