<?php

declare(strict_types=1);

use function DI\factory;

return [
    'Request' => factory(function () {
        return new \Http\HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }),
    'Response' => factory(function () {
        return new \Http\HttpResponse();
    })
];
