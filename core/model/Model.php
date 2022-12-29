<?php

namespace app\core\model;

use app\core\Kernel;

abstract class Model 
{
  protected $fillable;
  protected $table;

  public function save($fields): bool
  {
    try {
      $params = array_map(fn ($field) => ":$field", $this->fillable);

      $statement = self::prepare("INSERT INTO $this->table (" . implode(',', $this->fillable) . ")
        VALUES (" . implode(',', $params) . ")
      "); 
      foreach ($this->fillable as $field) {
        $statement->bindValue(":$field", $fields[$field]);
      }
      $statement->execute();
      return true;
    } catch (\Throwable $th)
    {
      return false;
    }
  }


  public function find($body)
  {
  }
  public static function prepare($sql)
  {
    return Kernel::$pdo->prepare($sql);
  }
}
