<?php
namespace app\core\router;
use app\core\request\Request;
use app\core\response\Response;
use app\core\view\View;

class Router
{
  use Methods;
  protected array $routes = [];
  public Request $request;
  public Response $response;

  private function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public static function router(Request $request, Response $response)
  {
    self::$router = new Router($request, $response);
    return self::$router;
  }

  public function resolve()
  {
    $path = $this->request->path();
    $method = $this->request->method();
    $callback = self::$router->routes[$method][$path] ?? false;

    if ($callback === false) {
      $this->response->setStatusCode(404);
      return View::renderView("404");;
    }
    if (is_string($callback)) {
      return View::renderView($callback);
    }
    if (is_array($callback)) {
      $callback[0] = new $callback[0]($this->request);
    }
    return call_user_func($callback, $this->request);
  }
}
