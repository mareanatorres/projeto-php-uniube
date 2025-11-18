<?php

class Database
{
  private static $instance = null;
  private $connection;

  private $host;
  private $dbname;
  private $username;
  private $password;

  public function __construct()
  {
    $this->host = getenv('DB_HOST') ?: '127.0.0.1';
    $this->dbname = getenv('DB_NAME') ?: 'meu_sistema';
    $this->username = getenv('DB_USER') ?: 'root';
    $this->password = getenv('DB_PASS') ?: '';

    $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
    try {
      $this->connection = new PDO($dsn, $this->username, $this->password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
      ]);
    } catch (PDOException $e) {
      die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  public function getConnection()
  {
    return $this->connection;
  }
}
