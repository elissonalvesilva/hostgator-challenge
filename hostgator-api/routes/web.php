<?php

use App\Controllers\HealthController;
use App\Controllers\UserController;
use App\Controllers\ProductsController;

$app->get('/health', HealthController::class . ':health');
$app->get('/api/users', UserController::class . ':users');
$app->get('/api/products', ProductsController::class . ':products');
