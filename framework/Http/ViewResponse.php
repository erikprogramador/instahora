<?php
declare(strict_types=1);

namespace Framework\Http;

use Framework\Http\Contracts\Response;

class ViewResponse implements Response
{
    protected $viewPath = __DIR__ . '/../../resources/views/';
    protected $viewExtension = '.view.php';

    public function respond($responseData)
    {
        ['view' => $view, 'data' => $data, 'layout' => $layout] = $responseData;

        extract($data);

        $content = require_once $this->mountPath($view);

        return require_once $this->mountPath($layout);
    }

    protected function mountPath($view)
    {
        return $this->viewPath . $view . $this->viewExtension;
    }
}
