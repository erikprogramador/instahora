<?php

use Erik\App;
use Framework\Router\Router;

require_once __DIR__ . '/../config/bootstrap.php';

$router = App::get(Router::class);

require_once __DIR__ . '/../config/routes.php';

$router->go();
