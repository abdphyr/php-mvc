<?php

namespace app\controllers;

use app\core\controller\Controller;
use app\models\Contact;

class SiteController extends Controller
{
  public function home()
  {
    return view('home', auth()->user());
  }

  public function contact()
  {
    return view('contact');
  }

  public function handleContact()
  {
    $isValidate = request()->validate([
      'subject' => 'required',
      'email' => 'required',
      'body' => 'required',
    ]);
    if ($isValidate) {
      return view('contact', [
        'model' => request()->body(),
        'errors' => request()->errors()
      ]);
    }
    $save = Contact::use()->save(request()->body());
    if($save) {
      session()->setFlash('success', "Message created successfully");
      response()->redirect('/');
    }
  }
}
