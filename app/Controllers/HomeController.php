<?php

namespace App\Controllers;

class HomeController extends Controller
{
    /**
     * @param $request
     * @param $response
     *
     * @return \Slim\Views\Twig
     */
    public function index($request, $response) {
        return $this->view->render($response, 'index.twig', ['response' => $response]);
    }
}