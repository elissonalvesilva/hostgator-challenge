<?php

use DI\Container;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Dotenv\Exception\InvalidPathException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Psr7\Response;
use Slim\Psr7\Request;


require_once __DIR__ . '/../vendor/autoload.php';

// load .env
try {
    (new Dotenv(__DIR__ . '/../'))->load();
} catch (InvalidPathException $e) {
    //
}

$container = new Container();

AppFactory::setContainer($container);

$app = AppFactory::create();

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


$customErrorHandler = function (
    ServerRequestInterface $request,
    \Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails
) use ($app) {
    $response = $app->getResponseFactory()->createResponse();
    $payload = json_encode(['error' => 'Not found Route']);
    $response->getBody()->write($payload);
    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
};

// Add Error Middleware
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
// Register the handler to handle only  HttpNotFoundException
// Changing the first parameter registers the error handler for other types of exceptions
$errorMiddleware->setErrorHandler(Slim\Exception\HttpNotFoundException::class, $customErrorHandler);


require_once __DIR__ . '/../bootstrap/database.php';
require_once __DIR__ . '/../routes/web.php';
