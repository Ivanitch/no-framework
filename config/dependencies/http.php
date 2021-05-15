<?php

declare(strict_types=1);

use Laminas\Diactoros\ServerRequestFactory;
use function DI\factory;

return [
    'Request' => factory(function () {
        return ServerRequestFactory::fromGlobals();
    })
];
