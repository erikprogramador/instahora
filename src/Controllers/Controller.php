<?php
declare(strict_types=1);

namespace Erik\Controllers;

use Framework\Http\{Request, Response};

class Controller
{
    protected $request;
    protected $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
