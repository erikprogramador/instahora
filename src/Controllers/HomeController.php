<?php
declare(strict_types=1);

namespace Erik\Controllers;

use Erik\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->response->view('home');
    }
}
