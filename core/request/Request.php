<?php

namespace app\core\request;

use app\core\validator\Validator;

class Request extends Validator
{
  public function user()
  {
    return auth()->user();
  }

  public function params()
  {
    $routes = router()->routes[$this->method()];
    $path = $this->path();
    $myroute = [];
    $params = [];
    foreach ($routes as $route => $callback) {
      $index = strpos($route, ':');
      if ($index) {
        $p = substr($path, 0, $index);
        $r = substr($route, 0, $index);
        if ($p === $r) {
          $myroute = explode('/', $route);
          break;
        }
      }
    }
    for ($i = 0; $i < count($myroute); $i++) {
      if (strpos($myroute[$i], ':') === 0) {
        $params[substr($myroute[$i], 1, strlen($myroute[$i]))] = explode('/', $path)[$i];
      }
    }
    return $params;
  }

  public function route()
  {
    $routes = router()->routes[$this->method()];
    $path = $this->path();
    foreach ($routes as $route => $callback) {
      $index = strpos($route, ':');
      if ($index) {
        $p = substr($path, 0, $index);
        $r = substr($route, 0, $index);
        if ($p === $r) {
          return $route;
        }
      }
    }
    return $path;
  }

  public function path()
  {
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $position = strpos($path, '?');
    if ($position === false) {
      return $path;
    }
    return substr($path, 0, 6);
  }

  public function method()
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }

  public function body()
  {
    $body = [];
    if ($this->method() === 'get') {
      foreach ($_GET as $key => $value) {
        $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }
    }
    if ($this->method() === 'post') {
      foreach ($_POST as $key => $value) {
        $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }
    }
    return $body;
  }
}
