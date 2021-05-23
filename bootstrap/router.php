<?php

use App\Action\Blog\Index;
use App\Action\Blog\View;
use App\Controllers\SiteController;
use League\Route\RouteGroup;

$router = new League\Route\Router;

$router->map('GET', '/', [SiteController::class, 'homeAction']);
$router->map('GET', '/about', [SiteController::class, 'aboutAction']);
$router->map('GET', '/hello', [SiteController::class, 'helloAction']);
$router->get('/contact', \App\Action\Contact::class);

$router->group('/blog', function (RouteGroup $route) {
    $route->get('/', Index::class);
    $route->get('/{slug:[\w\-]+}', View::class);
});




// End routes
return $router;
