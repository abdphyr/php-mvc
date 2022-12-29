<?php

namespace app\core\controller;

use app\core\request\Request;
use app\core\view\View;

abstract class Controller
{
  public Request $request;
  public $body;
  public $method;
  private ?string $layout = 'main';

  public function __construct(Request $request)
  {
    $this->request = $request;
    $this->body = $request->body();
    $this->method = $request->method();
  }

  public function view($view, $params = [])
  {
    return View::renderView($view, $params, $this->layout);
  }

  public function setLayout($layout)
  {
      $this->layout = $layout;
  }
}
