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
    } catch (\Throwable $th) {
      return false;
    }
  }


  public function findOne($where)
  {
    $attributes = array_keys($where);
    $sql = implode("AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));
    $statement = self::prepare("SELECT * FROM $this->table WHERE $sql");
    foreach ($where as $key => $item) {
      $statement->bindValue(":$key", $item);
    }
    $statement->execute();
    return $statement->fetchObject();
  }

  
  public static function prepare($sql)
  {
    return Kernel::$services->db->pdo->prepare($sql);
  }
}
