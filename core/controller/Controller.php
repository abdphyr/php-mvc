<?php

namespace app\core\controller;

use app\core\Kernel;


abstract class Controller
{
  private ?string $layout = 'main';

  public function view($view, $params = [])
  {
    return Kernel::$services->view->renderView($view, $params, $this->layout);
  }

  public function setLayout($layout)
  {
    $this->layout = $layout;
  }
}
