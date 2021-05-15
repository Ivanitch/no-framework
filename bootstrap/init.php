<?php

declare(strict_types=1);

use App\controllers\HomeController;
use DI\Container;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;


require_once __DIR__ . '/../vendor/autoload.php';

new \Framework\ErrorHandler(ENVIRONMENT_APP);

/** @var Container $container */
$container = require_once __DIR__ . '/../bootstrap/container.php';

$router = new League\Route\Router;

$router->map('GET', '/', [HomeController::class, 'indexAction']);
$router->map('GET', '/about', [HomeController::class, 'aboutAction']);

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