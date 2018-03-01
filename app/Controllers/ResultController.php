<?php
/**
 * @author Drew Ruppel
 * Controller for result page functionality.
 */
namespace App\Controllers;

use App\Classes\RecordHandler;
use App\Validation\Validator;
use Respect\Validation\Validator as v;

class ResultController extends Controller
{
    public function index($request, $response) {

    }

    public function lookup($request, $response) {
        v::with('App\\Validation\\Rules\\');

        $validator = $this->validator->validate($request, [
            'search' => v::notEmpty()->noWhitespace()->isDomainOrIp(),
        ]);

        if ($validator->failed()) {
            $this->flash->addMessage('errors', $validator->errors()['search']);
            return $response->withRedirect($this->router->pathFor('get.index'));
        } else {
            $handler = new RecordHandler($lookup);
            return $response;
        }
    }

    /*
        dump(dns_get_record('dfw25s26-in-f4.1e100.net'));
        dump(gethostbyaddr('172.217.9.132'));
        dump(gethostbyname('www.google.com'));
     */
}