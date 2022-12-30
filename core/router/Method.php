<?php

namespace app\core\router;

class Method
{
  public $method;
  public $route;
  public $callback;

  public function __construct($method, $route, $callback)
  {
    $this->method = $method;
    $this->route = $route;
    $this->callback = $callback;
    // $rr =  implode('/', array_map(fn ($r) => strpos($r, ':') === 0 ? 'param' : $r, explode('/', $route)));
    router()->routes[$method][$route] = $callback;
  }

  public function middleware($middleware)
  {
    router()->routes[$this->method][$this->route]['middleware'] = $middleware;
    return $this;
  }

  public function name($name)
  {
    router()->routes[$this->method][$this->route]['name'] = $name;
    return $this;
  }
}
