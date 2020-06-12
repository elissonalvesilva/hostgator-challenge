<?php

use App\Controllers\HealthController;
use App\Controllers\ProductsController;

$app->get('/health', HealthController::class . ':health');

$app->get('/api/products', ProductsController::class . ':index');
$app->get('/api/products/{id}', ProductsController::class . ':getProduct');

