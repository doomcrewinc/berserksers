<?php

// Controllers
use App\Controllers\HomeController;
use App\Controllers\ResultController;

// add csrf
$app->add($container->get('csrf'));

// Routes
$app->group('/', function() {
    $this->get('', HomeController::class . ':index')->setName('get.index');
});

$app->group('/results', function() {
    $this->get('', ResultController::class . ':index')->setName('get.results');
    $this->post('', ResultController::class . ':lookup')->setName('post.results');
});