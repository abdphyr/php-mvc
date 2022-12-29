<?php

namespace app\core\application;

use app\core\database\Database;
use app\core\request\Request;
use app\core\response\Response;
use app\core\router\Router;
use app\core\session\Session;

class Application
{
  public static string $ROOT_DIR;
  public Request $request;
  public Response $response;
  public Router $router;
  public Database $db;
  public Session $session;

  public function __construct($request, $response, $router, $db, $session, $root_dir)
  {
    $this->request = $request;
    $this->response = $response;
    $this->router = $router;
    $this->db = $db;
    $this->session = $session;
    self::$ROOT_DIR = $root_dir;
  }

  public function run()
  {
    require_once self::$ROOT_DIR . '/routes/web.php';
    echo $this->router->resolve();
  }
}
