<?php

use Erik\App;
use Framework\Database\Connection;
use Framework\Http\Contracts\Response as ResponseInterface;
use Framework\Http\Request;
use Framework\Http\Response;
use Framework\Router\Router;

App::define(Response::class, function () {
    return new Response;
});

App::define(Request::class, function () {
    return new Request($_SERVER, $_REQUEST);
});

App::define(Router::class, function () {
    return new Router(App::get(Request::class));
});

App::define(Connection::class, function () {
    return Connection::connect(config('database', env('database-connection', 'mysql')));
});
