<?php

namespace App\Controllers;

use App\Classes\Dns\Record;
use Slim\Http\Request;
use Slim\Http\Response;
use Respect\Validation\Validator as v;

class RecordsController extends Controller
{
    /**
     * @param $request
     * @param $response
     *
     * @return \Slim\Views\Twig
     */
    public function index(Request $request, Response $response) {
        return $this->view->render($response, '/pages/dns/records/index.twig', ['response' => $response]);
    }

    public function lookup(Request $request, Response $response) {
        // load our custom rules for validation
        v::with('App\\Validation\\Rules\\');

        // validate the requested domain or ip
        $validator = $this->validator->validate($request, [
            'search' => v::notEmpty()->noWhitespace()->isDomainOrIp(),
        ]);

        if ($validator->failed()) {
            $this->flash->addMessage('errors', $validator->errors()['search']);
            return $response->withRedirect($this->router->pathFor('get.index'));
        } else {
            $handler = new Record($request);
            $records = $handler->getRecords();
            return $this->view->render($response, '/pages/dns/records/result.twig', ['records' => $records, 'response' => $response]);
        }
    }
}