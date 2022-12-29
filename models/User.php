<?php

namespace app\models;

use app\core\model\Model;

class User extends Model
{
  protected $fillable = ['firstname', 'lastname', 'email', 'password', 'status'];
  protected $table = 'users';

  public static function use()
  {
    return new User();
  }

  public function register($reqBody)
  {
    $reqBody['status'] = 0;
    $reqBody['password'] = password_hash($reqBody['password'], PASSWORD_DEFAULT);
    return $this->save($reqBody);
  }

  public function login($reqBody)
  {
    $user = $this->findOne(['email' => $reqBody['email']]);
    if(!$user){
      setFlash('login', 'User doesn\'t exist this email');
      return false;
    }
    if(!password_verify($reqBody['password'], $user->password)){
      setFlash('login', 'Password is incorrect');
      return false;
    }
    login($user);
    return true;
  }
}
