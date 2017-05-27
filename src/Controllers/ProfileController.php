<?php
declare(strict_types=1);

namespace Erik\Controllers;

use Erik\App;
use Erik\Models\User;
use Erik\Models\Picture;
use Erik\Controllers\Controller;

/**
 * ProfileController
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class ProfileController extends Controller
{
    public function index()
    {
        if (!$this->request->get('username')) {
            session('flash', 'No username especified!');
            return $this->response->redirect('');
        }

        $user = App::get(User::class)
            ->pictures($this->request->get('username'));

        return $this->response->view('profile', compact('user'));
    }

    public function picture()
    {
        if (!$this->request->get('picture')) {
            session('flash', 'No picture id especified!');
            return $this->response->redirect('');
        }

        $picture = App::get(Picture::class)
            ->where('id', $this->request->get('picture'))
            ->get()[0];

        $user = App::get(User::class)
            ->where('id', $picture->users_id)
            ->get();
        $user['password'] = null;

        return $this->response->view('picture', compact('user', 'picture'));
    }

    public function upload()
    {
        //
    }
}
