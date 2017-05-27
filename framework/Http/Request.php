<?php
declare(strict_types=1);

namespace Framework\Http;

/**
 * Request
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class Request
{
    /**
     * Serve global instance
     *
     * @var $_SERVER
     */
    public $server;

    /**
     * Request global instance
     *
     * @var $_REQUEST
     */
    public $request;

    /**
     * Request contructor
     *
     * @param $_SERVER $server  Server global
     * @param $_REQUEST $request Request global
     */
    public function __construct($server, $request)
    {
        $this->server = $server;
        $this->request = $request;
    }

    /**
     * Get magic method
     *
     * @param  string $name Attribute name
     * @return mixed       The result of the call to attribute method
     */
    public function __get($name)
    {
        return $this->$name();
    }

    /**
     * Return a clean uri
     *
     * @return string The server uri clean
     */
    public function uri()
    {
        return explode('?', trim($this->server['REQUEST_URI'], '/'))[0];
    }

    /**
     * Return the request method type
     *
     * @return string The request method name
     */
    public function type()
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function get($key = null)
    {
        if (is_null($key)) {
            return $this->request;
        }

        if (!array_key_exists($key, $this->request)) {
            throw new \Exception("The key was not found!");
        }

        return $this->request[$key];
    }
}
