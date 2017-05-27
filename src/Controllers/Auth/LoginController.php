<?php
declare(strict_types=1);

namespace Erik\Controllers\Auth;

use Erik\App;
use Erik\Auth\Auth;
use Erik\Controllers\Controller;

/**
 * LoginController
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class LoginController extends Controller
{
    public function authenticate()
    {
        try {
            $user = App::get(Auth::class)->authenticate($this->request);

            session('flash', 'You are logged with success!');
            return $this->response->redirect('home');
        } catch (\Exception $e) {
            session('flash', $e->getMessage());

            return $this->response->redirect('');
        }
    }

    public function logout()
    {
        session('user', '');

        return $this->response->redirect('');
    }
}
