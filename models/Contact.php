<?php

namespace app\models;

use app\core\model\Model;

class Contact extends Model
{
  protected $fillable = ['subject', 'email', 'body'];
  protected $table = 'contacts';

  public static function use()
  {
    return new Contact();
  }

}
