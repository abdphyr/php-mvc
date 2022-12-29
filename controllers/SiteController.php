<?php
namespace app\controllers;

use app\core\auth\Auth;
use app\core\controller\Controller;
use app\core\request\Request;

class SiteController extends Controller
{

  public function home()
  {
    return $this->view('home', Auth::user());
  }

  public function contact()
  {
    $params = ['info' => "This is info"];
    return $this->view('contact', $params);
  }

  public function handleContact(Request $request)
  {
    // $body = Application::$app->request->getBody();
    // var_dump($body);
    // return "aaa";
    var_dump($request->body());
  }
}
