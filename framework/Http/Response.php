<?php
declare(strict_types=1);

namespace Framework\Http;

class Response
{
    protected $viewPath = __DIR__ . '/../../resources/views/';
    protected $viewExtension = '.view.php';

    public function view($view, $data = [], $layout = 'layouts/main')
    {
        extract($data);

        $content = require_once $this->mountPath($view);

        return require_once $this->mountPath($layout);
    }

    protected function mountPath($view)
    {
        return $this->viewPath . $view . $this->viewExtension;
    }
}
