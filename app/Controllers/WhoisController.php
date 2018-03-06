<?php

namespace App\Controllers;

class WhoisController extends Controller
{
    /**
     * @param $request
     * @param $response
     *
     * @return \Slim\Views\Twig
     */
    public function index($request, $response) {
        return $this->view->render($response, '/pages/whois/index.twig', ['response' => $response]);
    }

    public function lookup($request, $response) {

        return $this->view->render($response, '/pages/whois/result.twig', ['response' => $response]);
    }
}