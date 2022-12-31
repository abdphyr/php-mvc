<?php

use app\core\Kernel;

function request()
{
  return Kernel::$services->request;
}

function response()
{
  return Kernel::$services->response;
}

function router()
{
  return Kernel::$services->router;
}

function db()
{
  return Kernel::$services->db;
}

function auth()
{
  return Kernel::$services->auth;
}

function middleware()
{
  return Kernel::$services->middleware;
}

function session()
{
  return Kernel::$services->session;
}

function view($view, $params = [], $layout = 'main')
{
  return Kernel::$services->view->renderView($view, $params, $layout);
}

function prepare($sql)
{
  return Kernel::$services->db->pdo->prepare($sql);
}

function dd(...$arg)
{
  var_dump($arg);
  die;
}
