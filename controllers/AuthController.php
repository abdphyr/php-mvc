<?php

namespace app\controllers;

use app\core\controller\Controller;
use app\core\Kernel;
use app\core\request\Request;
use app\models\User;

class AuthController extends Controller
{
  public function loginView()
  {
    $this->setLayout('auth');
    return $this->view('login');
  }

  public function registerView()
  {
    $this->setLayout('auth');
    return $this->view('register');
  }

  public function register(Request $request)
  {
    $isError = $request->validate([
      'firstname' => 'required|unique',
      'lastname' => 'required',
      'email' => 'required|email|unique',
      'password' => 'required|min:8|max:24',
      'confirmPassword' => 'required|match:password'
    ], 'users');

    if ($isError) {
      $this->setLayout('auth');
      return $this->view('register', [
        'model' => $request->body(),
        'errors' => $request->errors
      ]);
    }

    $isRegister = User::use()->register($request->body());
    if ($isRegister) {
      Kernel::$session->setFlash('success', "Thanks for registering");
      Kernel::$response->redirect('/');
    }
  }


  public function login(Request $request)
  {
    $isError = $request->validate([
      'firstname' => 'required|min:10',
      'lastname' => 'required',
      'email' => 'required|email',
      'password' => 'required|min:8|max:24',
      'confirmPassword' => 'required|match:password'
    ]);

    if ($isError) {
      $error = $request->errors;
    }
    var_dump($error);
  }
}
