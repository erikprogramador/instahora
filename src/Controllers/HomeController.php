<?php
declare(strict_types=1);

namespace Erik\Controllers;

use Erik\Controllers\Controller;

/**
 * HomeController
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class HomeController extends Controller
{
    public function index()
    {
        return $this->response->view('home');
    }
}
