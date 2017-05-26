<?php
declare(strict_types=1);

namespace Framework\Router;

use Framework\Http\{Request, Response};

class Router
{
    protected $request;
    protected $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function define($requestType, $path, $controller)
    {
        $this->routes[$requestType][$path] = $controller;

        return $this;
    }

    public function get($path, $controller)
    {
        return $this->define('GET', $path, $controller);
    }

    public function post($path, $controller)
    {
        return $this->define('POST', $path, $controller);
    }

    public function go()
    {
        if (!array_key_exists($this->request->uri, $this->routes[$this->request->type])) {
            throw new \Exception("Can't responde to the url {$this->request->uri}");
        }

        if (is_callable($this->routes[$this->request->type][$this->request->uri])) {
            return $this->routes[$this->request->type][$this->request->uri]();
        }

        return $this->callAction(...explode('@', $this->routes[$this->request->type][$this->request->uri]));
    }

    protected function callAction($controller, $action)
    {
        $controller = '\\Erik\\Controllers\\' . $controller;
        $controller = new $controller($this->request, new Response);

        if (!method_exists($controller, $action)) {
            throw new \Exception("The Controller {$controller} can't respond to {$action} action.");
        }

        return $controller->$action();
    }
}
