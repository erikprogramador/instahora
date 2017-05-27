<?php
declare(strict_types=1);

namespace Framework\Http;

use Framework\Http\Contracts\Response;

/**
 * ViewResponse
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class ViewResponse implements Response
{
    /**
     * The path to a view
     *
     * @var string
     */
    protected $viewPath = __DIR__ . '/../../resources/views/';

    /**
     * The view extension
     *
     * @var string
     */
    protected $viewExtension = '.view.php';

    /**
     * Respond a request
     *
     * @param  array $responseData The data to respond from the controller
     */
    public function respond($responseData)
    {
        ['view' => $view, 'data' => $data, 'layout' => $layout] = $responseData;

        if (session('flash')) {
            $flash = session('flash');
            session('flash', '');
        }

        extract($data);

        $content = $this->mountPath($view);

        return require_once $this->mountPath($layout);
    }

    /**
     * Mount the path to the view
     *
     * @param  string $view The name of the view
     * @return string       The view with the path and extension
     */
    protected function mountPath($view)
    {
        return $this->viewPath . $view . $this->viewExtension;
    }
}
