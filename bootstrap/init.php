<?php

declare(strict_types=1);


use DI\Container;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;


require_once __DIR__ . '/../vendor/autoload.php';

new \Framework\ErrorHandler(ENVIRONMENT_APP);

/** @var Container $container */
$container = require_once __DIR__ . '/../bootstrap/container.php';

$router = new League\Route\Router;

$router->map('GET', '/', [App\controllers\SiteController::class, 'homeAction']);
$router->map('GET', '/about', [App\controllers\SiteController::class, 'aboutAction']);
$router->map('GET', '/hello', [App\controllers\SiteController::class, 'helloAction']);

$router->get('/blog', [App\controllers\BlogController::class, 'indexAction']);
$router->get('/blog/{slug:[\w\-]+}', [App\controllers\BlogController::class, 'viewAction']);

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