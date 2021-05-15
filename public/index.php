<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

defined('ENVIRONMENT_APP') or define('ENVIRONMENT_APP', 'dev'); // dev OR prod

require dirname(__DIR__) . '/bootstrap/init.php';