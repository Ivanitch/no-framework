<?php declare(strict_types=1);

error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

$environment = 'development';

// Error Handler
$whoops = new \Whoops\Run;
if ($environment !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function($e){
        echo 'Todo: Friendly error page and send an email to the developer';
    });
}
$whoops->register();

// Http
$request = new \Http\HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
$response = new \Http\HttpResponse;

foreach ($response->getHeaders() as $header) {
    header($header, false);
}

$content = '<h1>Hello World</h1>';
$response->setContent($content);

echo $response->getContent();