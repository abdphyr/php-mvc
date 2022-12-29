<?php

namespace app\core\database;

abstract class CreatePDO
{
  public \PDO $pdo;

  public function __construct(array $config)
  {
    $dbhost = $config['dbhost'] ?? '';
    $dbname = $config['dbname'] ?? '';
    $dbuser = $config['dbuser'] ?? '';
    $dbpassword = $config['dbpassword'] ?? '';
    $this->pdo = new \PDO("mysql:host=$dbhost;port=3306;dbname=$dbname", $dbuser, $dbpassword);
    $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
  }
}
