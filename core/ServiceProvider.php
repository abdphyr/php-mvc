<?php


return [
  'request' => app\core\request\Request::class, 
  'response' => app\core\response\Response::class,
  'router' => app\core\router\Router::class,
  'db' => app\core\database\Database::class,
  'session' => app\core\session\Session::class,
  'view' => app\core\view\View::class,
  'auth' => app\core\auth\Auth::class,
  'middleware' => app\core\middleware\MiddlewareServie::class
];