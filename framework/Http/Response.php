<?php
declare(strict_types=1);

namespace Framework\Http;

/**
 * Response
 *
 * @author Erik Vanderlei Fernandes <erik.vanderlei.programador@outlook.com>
 * @version 1.0.0
 */
class Response
{
    /**
     * Respond with a view
     *
     * @param  string $view   The name of the view
     * @param  array  $data   The data to be pass from controller to the view
     * @param  string $layout The layout for display the view
     */
    public function view($view, $data = [], $layout = 'layouts/main')
    {
        return (new ViewResponse())->respond(compact('view', 'data', 'layout'));
    }
}
