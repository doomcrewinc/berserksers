<?php
/**
 * Created by PhpStorm.
 * User: drupp
 * Date: 3/1/2018
 * Time: 4:06 PM
 */

namespace App\Middleware;

use Slim\Views\Twig;

class OldInputMiddleware
{
    protected $view;

    public function __construct(Twig $view) {
        $this->view = $view;
    }

    public function __invoke($request, $response, $next) {
        if (isset($_SESSION['old'])) {
            $this->view->getEnvironment()->addGlobal('old', $_SESSION['old']);
        }

        $_SESSION['old'] = $request->getParams();

        return $next($request, $response);
    }

}