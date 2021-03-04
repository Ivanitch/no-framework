<?php declare(strict_types = 1);

return [
    ['GET', '/', [\App\controllers\HomeController::class, 'show']],
    ['GET', '/about', [\App\controllers\HomeController::class, 'about']],
];
