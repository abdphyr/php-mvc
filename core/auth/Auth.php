<?php

namespace app\core\auth;

class Auth
{
  public static function user()
  {
    $primaryValue = getSession('user');
    if ($primaryValue) {
      $statement = prepare("SELECT * FROM users WHERE id = $primaryValue");
      $statement->execute();
      return $statement->fetchObject();
    }
    return false;
  }
}
