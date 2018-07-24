<?php

// Controllers
use App\Controllers\BlacklistController;

// Routes
$app->group('/api/v1', function() {
    $this->get('/get-blacklist', BlacklistController::class . ':getBlacklist');
    $this->get('/query-blacklist', BlacklistController::class . ':queryBlacklist');
});
