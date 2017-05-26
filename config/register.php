<?php

use Erik\App;
use Framework\Http\Request;
use Framework\Http\Response;
use Framework\Router\Router;
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
