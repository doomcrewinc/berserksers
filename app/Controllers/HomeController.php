<?php
/**
 * @author Drew Ruppel
 * Controller for index page functionality.
 */
namespace App\Controllers;

class HomeController extends Controller
{
    public function index($request, $response) {
        return $this->container->view->render($response, 'home.twig');
    }
}