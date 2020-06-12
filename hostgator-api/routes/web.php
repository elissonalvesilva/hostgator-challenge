<?php

use App\Controllers\HealthController;
use App\Controllers\ProductsController;

$app->get('/health', HealthController::class . ':health');

$app->get('/api/prices', ProductsController::class . ':index');
$app->get('/api/prices/{id}', ProductsController::class . ':getProduct');

