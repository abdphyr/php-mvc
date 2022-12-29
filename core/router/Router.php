<?php

namespace app\core\router;

use app\core\Kernel;

class Router
{
  public array $routes = [];
  public function resolve()
  {
    $path = Kernel::$services->request->path();
    $method = Kernel::$services->request->method();
    $callback = $this->routes[$method][$path] ?? false;

    if ($callback === false) {
      Kernel::$services->response->setStatusCode(404);
      return Kernel::$services->view->renderView("404");;
    }
    if (is_string($callback)) {
      return Kernel::$services->view->renderView($callback);
    }
    if (is_array($callback)) {
      $callback[0] = new $callback[0]();
    }
    return call_user_func($callback, Kernel::$services->request, Kernel::$services->response);
  }
}
