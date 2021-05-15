<?php

declare(strict_types=1);

use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->useAutowiring(false);
$builder->useAnnotations(false);

$dependencies = require_once __DIR__ . '/dependencies.php';

$builder->addDefinitions($dependencies);

try {
    return $builder->build();
} catch (Exception $e) {
    // TODO: Write to logs
    echo $e->getMessage();
}
