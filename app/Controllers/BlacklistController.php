<?php

namespace App\Controllers;

use App\Classes\Dns\Blacklist;
use Slim\Http\Request;
use Slim\Http\Response;

class BlacklistController extends Controller
{
    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
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

    /**
     * @param Request  $request
     * @param Response $response
     * @return Response
     */
    public function queryBlacklist(Request $request, Response $response) {
        if (is_json($request) && $request->isGet()) {
            $dns    = new Blacklist($request);
            $result = $dns->checkIfBlacklisted();
            return $response->withJson($result);
        } else {
            return $response->withStatus(400, 'Error: unacceptable request');
        }
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @return Response
     */
    public function getBlacklist(Request $request, Response $response) {
        if (is_json($request)) {
            return $response->withJson(Blacklist::returnList());
        } else {
            return $response->withStatus(400, 'Error: unacceptable request.');
        }
    }
}