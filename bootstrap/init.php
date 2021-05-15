<?php

declare(strict_types=1);

use App\controllers\SiteController;
use DI\Container;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;


require_once __DIR__ . '/../vendor/autoload.php';

new \Framework\ErrorHandler(ENVIRONMENT_APP);

/** @var Container $container */
$container = require_once __DIR__ . '/../bootstrap/container.php';

$router = new League\Route\Router;

$router->map('GET', '/', [SiteController::class, 'homeAction']);
$router->map('GET', '/about', [SiteController::class, 'aboutAction']);
$router->map('GET', '/hello', [SiteController::class, 'helloAction']);

// Request
$request = $container->get('Request');

try {
    $response = $router->dispatch($request);
} catch (Exception $e) {
    $response = new HtmlResponse('Undefined page', 404);
}


// Response
$emitter = new SapiEmitter();
$emitter->emit($response);