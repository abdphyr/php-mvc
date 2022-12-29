<?php
namespace app\core\router;

trait Methods
{
  public static Router $router;

  public static function get($path, $callback)
  {
    self::$router->routes['get'][$path] = $callback;
  }

  public static function post($path, $callback)
  {
    self::$router->routes['post'][$path] = $callback;
  }
}
