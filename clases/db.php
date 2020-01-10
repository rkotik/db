<?php

require_once 'config/config.php';

class DB
{

  private $host;
  private $db;
  private $user;
  private $pass;
  private $charset;

  public function __construct()
  {
    $this->host = HOST;
    $this->db = NAME;
    $this->user = USER;
    $this->pass = PASS;
    $this->charset = CHARSET;
  }

  function connect()
  {
    try {
      $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
      $options = [
        PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES  => false
      ];

      $pdo = new PDO($connection, $this->user, $this->pass, $options);
      return $pdo;
    } catch (PDOException $e) {
      $errCode = $e->getCode();
      if ($errCode == 1044 || $errCode == 1045) {
        $errMessage = "Error en usuario o contraseña de la base de datos";
      } elseif ($errCode == 1049) {
        $errMessage = "Base de datos inexistente";
      } elseif ($errCode == 2002) {
        $errMessage = "Problemas con el HOST";
      } else {
        $errMessage = "Problema genérico";
      }

      die("Error de conexión a la base de datos: " . $errMessage);
    }
  }
}