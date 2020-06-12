<?php

use App\Controllers\HealthController;
use App\Controllers\ProductsController;
use Slim\Routing\RouteCollectorProxy;

// health check
$app->get('/health', HealthController::class . ':health');

/**
 * Api Route group
 */
$app->group('/api', function (RouteCollectorProxy $group) {

  // get all product prices
  $group->get('/prices', ProductsController::class . ':index');

  // get product price by id
  $group->get('/prices/{pid}', ProductsController::class . ':getProduct');
});


