<?php
declare(strict_types=1);

namespace Framework\Http;

class Request
{
    public $server;
    public $request;

    public function __construct($server, $request)
    {
        $this->server = $server;
        $this->request = $request;
    }

    public function __get($name)
    {
        return $this->$name();
    }

    public function uri()
    {
        return trim($this->server['REQUEST_URI'], '/');
    }

    public function type()
    {
        return $this->server['REQUEST_METHOD'];
    }
}
