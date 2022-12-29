<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Kernel;

Kernel::init(dirname(__DIR__));

$app = Kernel::$app;

$app->run();
