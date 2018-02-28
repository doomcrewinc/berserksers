<?php
/**
 * @author Drew Ruppel
 * Controller for result page functionality.
 */
namespace App\Controllers;

use App\Classes\Records;

class ResultController extends Controller
{
    public function index($request, $response) {

    }

    public function lookup($request, $response) {
        if ($lookup = $request->getParam('lookup')) {
            $handler = new Records($lookup);

            return $response;
        } else {
            $this->flash->addMessage('errors', 'Invalid IP/Domain format.');
            return $response->withRedirect($this->router->pathFor('get.index'));
        }
    }

    /*
        dump(dns_get_record('dfw25s26-in-f4.1e100.net'));
        dump(gethostbyaddr('172.217.9.132'));
        dump(gethostbyname('www.google.com'));
     */
}