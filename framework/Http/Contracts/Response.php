<?php
declare(strict_types=1);

namespace Framework\Http\Contracts;

interface Response
{
    public function respond($responseData);
}
