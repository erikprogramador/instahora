<?php
declare(strict_types=1);

namespace Framework\Http;

class Response
{
    public function view($view, $data = [], $layout = 'layouts/main')
    {
        return (new ViewResponse())->respond(compact('view', 'data', 'layout'));
    }
}
