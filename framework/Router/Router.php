<?php
declare(strict_types=1);

namespace Framework\Router;

use Erik\App;
use Framework\Http\{Request, Response};

/**
 * Router
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class Router
{
    /**
     * Request instance
     *
     * @var Request
     */
    protected $request;

    /**
     * Routes to respond
     *
     * @var array
     */
    protected $routes = [];

    /**
     * Router constructor
     *
     * @param Request $request The request instance
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Define the route
     *
     * @param  string $requestType Type of request GET|POST
     * @param  string $path        The string route to respond
     * @param  callable|string $controller  The controller or callable to respond
     * @return self              Return this instance
     */
    public function define($requestType, $path, $controller)
    {
        $this->routes[$requestType][$path] = $controller;

        return $this;
    }

    /**
     * Define the route to GET request
     *
     * @param  string $path        The string route to respond
     * @param  callable|string $controller  The controller or callable to respond
     * @return self              Return this instance
     */
    public function get($path, $controller)
    {
        return $this->define('GET', $path, $controller);
    }

    /**
     * Define the route to POST request
     *
     * @param  string $path        The string route to respond
     * @param  callable|string $controller  The controller or callable to respond
     * @return self              Return this instance
     */
    public function post($path, $controller)
    {
        return $this->define('POST', $path, $controller);
    }

    /**
     * Respond to Browser Request
     */
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

    /**
     * Define the action to be called on the controller
     *
     * @param  string $controller The controller instance name
     * @param  string $action     The action name
     */
    protected function callAction($controller, $action)
    {
        $controller = '\\Erik\\Controllers\\' . $controller;
        $controller = new $controller($this->request, App::get(Response::class));

        if (!method_exists($controller, $action)) {
            throw new \Exception("The Controller {$controller} can't respond to {$action} action.");
        }

        return $controller->$action();
    }
}
