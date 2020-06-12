<?php

use DI\Container;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Dotenv\Exception\InvalidPathException;
use Psr\Http\Message\ServerRequestInterface;

use App\Handlers\HttpErrorHandler;

require_once __DIR__ . '/../vendor/autoload.php';

$displayErrorDetails = false;

// load .env
try {
    (new Dotenv(__DIR__ . '/../'))->load();
} catch (InvalidPathException $e) {
    //
}

$container = new Container();

AppFactory::setContainer($container);

$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();
$responseFactory = $app->getResponseFactory();

//create error handler
$errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);

// Add Routing Middleware
$app->addRoutingMiddleware();

/**
 * Add settings in container
 */
$container->set('settings', function () {
    return [
        'app' => [
            'name' => getenv('APP_NAME')
        ],
        'database' => [
            'driver'    => getenv('DB_DRIVER'),
            'host'      => getenv('DB_HOST'),
            'port'      => getenv('DB_PORT'),
            'database'  => getenv('DB_DATABASE'),
            'username'  => getenv('DB_USERNAME'),
            'password'  => getenv('DB_PASSWORD')
        ],
    ];
});

// Add Error Handling Middleware
$errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, false, false);
$errorMiddleware->setDefaultErrorHandler($errorHandler);

require_once __DIR__ . '/../bootstrap/database.php';
require_once __DIR__ . '/../routes/web.php';

return $app;
