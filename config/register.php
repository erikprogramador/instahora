<?php

use Erik\App;
use Framework\Router\Router;
use Erik\Models\{User, Picture};
use Framework\Database\Connection;
use Erik\Auth\{Auth, Login, StoreUser};
use Framework\Http\{Request, Response};
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

App::define(StoreUser::class, function () {
    return new StoreUser;
});

App::define(User::class, function () {
    return new User(App::get(Connection::class));
});

App::define(Picture::class, function () {
    return new Picture(App::get(Connection::class));
});
