<?php

namespace app\controllers;

use app\core\controller\Controller;
use app\core\request\Request;
use app\models\User;

class AuthController extends Controller
{
  public function loginView()
  {
    return view('login', [], 'auth');
  }

  public function registerView()
  {
    return view('register', [], 'auth');
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
      return view('register', [
        'model' => $request->body(),
        'errors' => $request->errors
      ], 'auth');
    }

    $isRegister = User::use()->register($request->body());
    
    if ($isRegister) {
      setFlash('success', "Thanks for registering");
      redirect('/');
    }
  }


  public function login(Request $request)
  {
    $isError = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8|max:24',
    ]);

    if ($isError) {
      return view('login', [
        'model' => $request->body(),
        'errors' => $request->errors
      ], 'auth');
    }

    $login = User::use()->login($request->body());
    if ($login) {
      setFlash('success', "You are login successfully !");
      redirect('/');
    } else {
      return view('login', [], 'auth');
    }
  }
  public function logout()
  {
    logout();
    return redirect('/');
  }
}
