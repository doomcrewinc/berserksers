<?php
/**
 * @author Drew Ruppel
 * Controller for result page functionality.
 */
namespace App\Controllers;

class ResultController extends Controller
{
    public function index($request, $response) {
        echo 'd';
    }

    public function lookup($request, $response) {
        echo 'f';
        $this->flash->addMessage('errors', 'Invalid IP/Domain format.');

        return $response->withRedirect($this->router->pathFor('get.index'));
    }
}