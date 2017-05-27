<?php

use Erik\App;
use Erik\Auth\Auth;
use Erik\Auth\Login;
use Framework\Http\Request;
use Framework\Http\Response;
use Framework\Router\Router;
use Framework\Database\Connection;
use Framework\Http\Contracts\Response as ResponseInterface;

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

App::define(Auth::class, function () {
    return new Login;
});
