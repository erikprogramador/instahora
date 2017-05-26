<?php

use Framework\Http\Request;
use Framework\Router\Router;

require_once __DIR__ . '/../config/bootstrap.php';

$router = new Router(new Request($_SERVER, $_REQUEST));

require_once __DIR__ . '/../config/routes.php';

$router->go();
