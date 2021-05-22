<?php

declare(strict_types=1);

use Laminas\Diactoros\Request;
use Laminas\Diactoros\ServerRequestFactory;
use function DI\factory;

return [
    Request::class => factory(function () {
        return ServerRequestFactory::fromGlobals();
    })
];
