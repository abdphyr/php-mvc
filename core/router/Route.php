<?php

namespace app\core\router;

use app\core\Kernel;

class Route
{
  public static function get($path, $callback)
  {
    Kernel::$services->router->routes['get'][$path] = $callback;
  }

  public static function post($path, $callback)
  {
    Kernel::$services->router->routes['post'][$path] = $callback;
  }

  public static function put($path, $callback)
  {
    Kernel::$services->router->routes['put'][$path] = $callback;
  }

  public static function patch($path, $callback)
  {
    Kernel::$services->router->routes['patch'][$path] = $callback;
  }

  public static function delete($path, $callback)
  {
    Kernel::$services->router->routes['delete'][$path] = $callback;
  }
}
