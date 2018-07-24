<?php

// Controllers
use App\Controllers\HomeController;
use App\Controllers\WhoisController;
use App\Controllers\RecordsController;
use App\Controllers\BlacklistController;

// Middleware
use App\Middleware\OldInputMiddleware;


// Routing
// add csrf
$app->add($container->get('csrf'));

// Routes
$app->group('/', function() {
    $this->get('', HomeController::class . ':index')->setName('get.index');
});

$app->group('/records', function() {
    $this->get('', RecordsController::class . ':index')->setName('get.records');
    $this->post('', RecordsController::class . ':lookup')->setName('post.records');
});

$app->group('/blacklists', function() {
    $this->get('', BlacklistController::class . ':index')->setName('get.blacklists');
    $this->post('', BlacklistController::class . ':lookup')->setName('post.blacklists');
});

$app->group('/whois', function() {
    $this->get('', WhoisController::class . ':index')->setName('get.whois');
    $this->post('', WhoisController::class . ':lookup')->setName('post.whois');
});

$app->add(new OldInputMiddleware($container->view));