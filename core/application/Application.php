<?php

namespace app\core\application;

use app\core\Kernel;

class Application
{
  public static string $ROOT_DIR;

  public function __construct($root_dir)
  {
    self::$ROOT_DIR = $root_dir;
  }

  public function run()
  {
    require_once dirname(__DIR__) . '/HelperFunctions.php';
    require_once self::$ROOT_DIR . '/routes/web.php';
    echo Kernel::$services->router->resolve();
  }
}
