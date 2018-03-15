<?php

namespace App\Controllers;

use App\Classes\Dns\Blacklist;
use Slim\Http\Request;
use Slim\Http\Response;

class BlacklistController extends Controller
{
    /**
     * @param $request
     * @param $response
     *
     * @return \Slim\Views\Twig
     */
    public function index(Request $request, Response $response) {
        return $this->view->render($response, '/pages/dns/blacklist/index.twig', ['response' => $response]);
    }

    public function lookup(Request $request, Response $response) {

        return $this->view->render($response, '/pages/dns/blacklist/result.twig', ['response' => $response]);
    }

    public function queryBlacklist(Request $request, Response $response) {

    }

    public function getBlacklist(Request $request, Response $response) {
        dump($request->getContentType());
    }
}