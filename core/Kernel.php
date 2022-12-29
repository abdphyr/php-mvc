<?php

namespace app\core;

use app\core\application\Application;
use app\core\database\Database;
use app\core\request\Request;
use app\core\response\Response;
use app\core\router\Router;
use app\core\session\Session;

class Kernel
{
  public static string $ROOT_DIR;
  public static Application $app;
  public static Router $router;
  public static Request $request;
  public static Response $response;
  public static Database $db;
  public static \PDO $pdo;
  public static Session $session;

  public static function init($root_dir)
  {
    self::$ROOT_DIR = $root_dir;
    self::$request = new Request();
    self::$response = new Response();
    self::$router = Router::router(self::$request, self::$response);
    self::$db = self::initDatabase();
    self::$pdo = self::initPDO();
    self::$session = new Session();
    self::$app = new Application(self::$request, self::$response, self::$router, self::$db,self::$session, $root_dir);
  }

  private static function initPDO()
  {
    return self::$db->pdo;
  }

  private static function initDatabase()
  {
    $config = require __DIR__ . '/config/db.php';
    return new Database($config['db']);
  }
}
