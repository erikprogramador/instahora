<?php
declare(strict_types=1);

namespace Erik\Controllers;

use Erik\App;
use Erik\Models\{User, Picture};
use Erik\Controllers\Controller;

/**
 * DashboardController
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class DashboardController extends Controller
{
    public function index()
    {
        $pictures = App::get(Picture::class)
            ->select()
            ->users()
            ->get();

        return $this->response->view('dashboard', compact('pictures'));
    }
}
