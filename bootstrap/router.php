<?php

$router = new League\Route\Router;

$router->map('GET', '/', [App\Controllers\SiteController::class, 'homeAction']);
$router->map('GET', '/about', [App\Controllers\SiteController::class, 'aboutAction']);
$router->map('GET', '/hello', [App\Controllers\SiteController::class, 'helloAction']);

$router->get('/blog', [App\Controllers\BlogController::class, 'indexAction']);
$router->get('/blog/{slug:[\w\-]+}', [App\Controllers\BlogController::class, 'viewAction']);


// End routes
return $router;
