<?php

declare(strict_types=1);

return [
    'db' => [
        'host' => 'localhost'
    ],
    'urlManager' => [
        ['GET', '/', [\App\controllers\HomeController::class, 'show']],
        ['GET', '/about', [\App\controllers\HomeController::class, 'about']],
    ]
];

