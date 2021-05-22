<?php

$router = new League\Route\Router;

$router->map('GET', '/', [App\controllers\SiteController::class, 'homeAction']);
$router->map('GET', '/about', [App\controllers\SiteController::class, 'aboutAction']);
$router->map('GET', '/hello', [App\controllers\SiteController::class, 'helloAction']);

$router->get('/blog', [App\controllers\BlogController::class, 'indexAction']);
$router->get('/blog/{slug:[\w\-]+}', [App\controllers\BlogController::class, 'viewAction']);


// End routes
return $router;
