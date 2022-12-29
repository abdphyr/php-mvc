<?php

use app\core\Kernel;

function view($view, $params = [], $layout = 'main')
{
  return Kernel::$services->view->renderView($view, $params, $layout);
}

function setFlash($key, $message)
{
  Kernel::$services->session->setFlash($key, $message);
}

function getFlash($key)
{
  return Kernel::$services->session->getFlash($key);
}

function setSession($key, $value)
{
  Kernel::$services->session->set($key, $value);
}

function getSession($key)
{
  return Kernel::$services->session->get($key);
}

function removeSession($key)
{
  Kernel::$services->session->remove($key);
}

function redirect($path)
{
  Kernel::$services->response->redirect($path);
}

function prepare($sql)
{
  return Kernel::$services->db->pdo->prepare($sql);
}

function login($user)
{
  setSession('user', $user->id);
}

function logout()
{
  removeSession('user');
}

function user()
{
  $primaryValue = getSession('user');
  if($primaryValue){
    $statement = prepare("SELECT * FROM users WHERE id = $primaryValue");
    $statement->execute();
    return $statement->fetchObject();
  }
  return false;
}


/**
 * HTTP `GET` method
 */
function get($path, $callback)
{
  Kernel::$services->router->routes['get'][$path] = $callback;
}
/**
 * HTTP `POST` method
 */
function post($path, $callback)
{
  Kernel::$services->router->routes['post'][$path] = $callback;
}
/**
 * HTTP `PUT` method
 */
function put($path, $callback)
{
  Kernel::$services->router->routes['put'][$path] = $callback;
}
/**
 * HTTP `PATCH` method
 */
function patch($path, $callback)
{
  Kernel::$services->router->routes['patch'][$path] = $callback;
}
/**
 * HTTP `DELETE` method
 */
function delete($path, $callback)
{
  Kernel::$services->router->routes['delete'][$path] = $callback;
}
