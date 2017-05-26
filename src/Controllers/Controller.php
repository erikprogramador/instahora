<?php
declare(strict_types=1);

namespace Erik\Controllers;

use Framework\Http\{Request, Response};

/**
 * Controller
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
abstract class Controller
{
    /**
     * Request instance
     * @var Request
     */
    protected $request;

    /**
     * Response instance
     * @var Response
     */
    protected $response;

    /**
     * Class Contructor
     *
     * @param Request  $request  Request instance
     * @param Response $response Response instance
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
