<?php

namespace app\core\database;

class Column
{
  public string $tablename;
  public string $column;
  public \PDO $pdo;
  public string $sql = '';

  public function __construct(string $tablename, string $column, \PDO $pdo)
  {
    $this->tablename = $tablename;
    $this->column = $column;
    $this->pdo = $pdo;
  }

  public function string($size)
  {
    $this->sql = "ALTER TABLE $this->tablename ADD COLUMN $this->column VARCHAR($size) NOT NULL";
    $this->pdo->exec($this->sql);
    return $this;
  }

  public function text()
  {
    $this->sql = "ALTER TABLE $this->tablename ADD COLUMN $this->column TEXT NOT NULL";
    $this->pdo->exec($this->sql);
    return $this;
  }

  public function number()
  {
    $this->sql = "ALTER TABLE $this->tablename ADD COLUMN $this->column TINYINT NOT NULL";
    $this->pdo->exec($this->sql);
    return $this;
  }

  public function nullable()
  {
    $this->pdo->exec("ALTER TABLE $this->tablename DROP COLUMN $this->column");
    $sql = str_replace("NOT NULL", '', $this->sql);
    $this->pdo->exec($sql);
  }
}
