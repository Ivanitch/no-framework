<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

const ENVIRONMENT = "dev"; // dev OR prod

require __DIR__ . '/../src/bootstrap.php';