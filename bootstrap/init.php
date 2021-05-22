<?php

declare(strict_types=1);

use DI\Container;
use Framework\ErrorHandler;
use Laminas\Diactoros\Request;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Psr\Http\Message\ServerRequestInterface;


require_once __DIR__ . '/../vendor/autoload.php';

new ErrorHandler(ENVIRONMENT_APP);

// Container
/** @var Container $container */
$container = require_once __DIR__ . '/../bootstrap/container.php';

// Router
/** @var League\Route\Router $router */
$router = require_once __DIR__ . '/router.php';

try {
    // Request
    /** @var ServerRequestInterface $request $request */
    $request = $container->get(Request::class);
    $response = $router->dispatch($request);
} catch (Exception $e) {
    $response = new HtmlResponse('Undefined page', 404);
}

// Response
$emitter = new SapiEmitter();
$emitter->emit($response);