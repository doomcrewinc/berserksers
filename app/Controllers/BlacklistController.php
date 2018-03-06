<?php

namespace App\Controllers;

class BlacklistController extends Controller
{
    /**
     * @param $request
     * @param $response
     *
     * @return \Slim\Views\Twig
     */
    public function index($request, $response) {
        return $this->view->render($response, '/pages/dns/blacklist/index.twig', ['response' => $response]);
    }

    public function lookup($request, $response) {

        return $this->view->render($response, '/pages/dns/blacklist/result.twig', ['response' => $response]);
    }
}