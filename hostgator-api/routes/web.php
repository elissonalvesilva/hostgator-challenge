<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\ProductsController;

$app->get('/', HomeController::class . ':index');
$app->get('/api/users', UserController::class . ':users');
$app->get('/api/products', ProductsController::class . ':products');
