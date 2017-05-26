<?php
declare(strict_types=1);

namespace Framework\Http\Contracts;

/**
 * Response Interface
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
interface Response
{
    /**
     * Respond a request
     *
     * @param  array $responseData The data to respond from the controller
     */
    public function respond($responseData);
}
