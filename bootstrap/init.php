<?php

declare(strict_types=1);

use DI\Container;

require_once __DIR__ . '/../vendor/autoload.php';

new \Framework\ErrorHandler(ENVIRONMENT);

/** @var Container $container */
$container = require_once __DIR__ . '/../bootstrap/container.php';


// Http
$request = $container->get('Request');
$response = $container->get('Response');

foreach ($response->getHeaders() as $header) {
    header($header, false);
}

// Router
$routeDefinitionCallback = function (\FastRoute\RouteCollector $r) use ($container) {
    $routes = $container->get('urlManager');
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
};

$dispatcher = \FastRoute\simpleDispatcher($routeDefinitionCallback);

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPath());
switch ($routeInfo[0]) {
    case \FastRoute\Dispatcher::NOT_FOUND:
        $response->setContent('404 - Page not found');
        $response->setStatusCode(404);
        break;
    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 - Method not allowed');
        $response->setStatusCode(405);
        break;
    case \FastRoute\Dispatcher::FOUND:
        $className = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];
        $container->set('className', function () use ($className, $request, $response) {
            return new $className($request, $response);
        });
        $class = $container->get('className');
        $class->$method($vars);
        break;
}

// Response
echo $response->getContent();