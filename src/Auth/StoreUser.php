<?php
declare(strict_types=1);

namespace Erik\Auth;

use Erik\App;
use Erik\Models\User;
use Framework\Http\Request;
use Framework\Security\Hash;

class StoreUser
{
    protected $user;

    public function proccess($data)
    {
        $this->database($data)
            ->session();
    }

    public function database($data)
    {
        $data = [
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => Hash::password($data['password']),
            'description' => $data['description']
        ];

        $this->user = App::get(User::class)->create($data);

        return $this;
    }

    public function session($data = null)
    {
        $user = [
            'id'       => $this->user->id ?? $data['id'],
            'username' => $this->user->username ?? $data['username'],
            'email'    => $this->user->email ?? $data['email']
        ];

        session('user', $user);

        return $this;
    }
}
