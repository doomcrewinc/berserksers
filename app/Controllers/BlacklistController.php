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
     * @return \Slim\Views\Twig
     */
    public function index(Request $request, Response $response) {
        return $this->view->render($response, '/pages/dns/blacklist/index.twig', ['response' => $response]);
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @return \Slim\Views\Twig
     */
    public function lookup(Request $request, Response $response) {
        return $this->view->render($response, '/pages/dns/blacklist/result.twig', ['response' => $response]);
    }

    public function queryBlacklist(Request $request, Response $response) {
        if (is_json($request) && $request->isPost()) {
            return ; // TODO: return our challenge to the dnsbl we received + ip.
        }
        return null;
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @return Response
     */
    public function getBlacklist(Request $request, Response $response) {
        $value = [];

        if (is_json($request)) {
            $value = Blacklist::returnList();
        }

        return $response->withJson($value);
    }
}