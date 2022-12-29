<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\application\Application;
use app\core\Kernel;

Kernel::init();

$app = new Application(dirname(__DIR__));

$app->run();
