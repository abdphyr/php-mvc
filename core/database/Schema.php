<?php

namespace app\core\database;

class Schema extends CreatePDO
{
  private static Schema $schema;
  private string $tablename;

  private function __construct($tablename, $config)
  {
    $this->tablename = $tablename;
    parent::__construct($config);
  }

  public static function table($tablename)
  {
    $config = require __DIR__ . '/../config/db.php';
    self::$schema = new Schema($tablename, $config['db']);

    self::$schema->pdo->exec("CREATE TABLE IF NOT EXISTS $tablename (
      id INT AUTO_INCREMENT PRIMARY KEY
    ) ENGINE=INNODB;");
    return self::$schema;
  }

  public function column($column)
  {
    return new Column($this->tablename, $column, $this->pdo);
  }

  public function created_at()
  {
    $sql = "ALTER TABLE $this->tablename ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
    $this->pdo->exec($sql);
  }

  public function updated_at()
  {
    $sql = "ALTER TABLE $this->tablename ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
    $this->pdo->exec($sql);
  }
}
