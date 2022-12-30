<?php

namespace app\core;

use app\core\auth\Auth;
use app\core\database\Database;
use app\core\middleware\MiddlewareServie;
use app\core\request\Request;
use app\core\response\Response;
use app\core\router\Router;
use app\core\session\Session;
use app\core\view\View;

class ServiceContainer
{
  public Request $request;
  public Response $response;
  public Router $router;
  public Database $db;
  public Session $session;
  public View $view;
  public Auth $auth;
  public MiddlewareServie $middleware;

  public function __construct()
  {
    $services = require_once __DIR__ . '/ServiceProvider.php';
    foreach ($services as $service => $class) {
      $this->{$service} = new $class();
    }
  }
}
