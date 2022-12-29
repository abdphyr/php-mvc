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

  public function register($filelds)
  {
    $filelds['status'] = 0;
    $filelds['password'] = password_hash($filelds['password'], PASSWORD_DEFAULT);
    return $this->save($filelds);
  }

  public function login($filelds)
  {
    // $user = User::findOne();
  }
}
