<?php

declare(strict_types = 1);

$configMerge = array_merge(
    glob('../config/dependencies/*.php' ?: []),
    glob('../config/*.php' ?: []),
);

$config = array_map(function ($configMerge) {
    return require_once $configMerge;
}, $configMerge);

return array_merge_recursive(...$config);
