<?php

require_once 'db.php';

// SHOW TABLES listar las tablas de la base de datos
class Backup extends DB
{

  public function tablas()
  {
    $query = "SHOW TABLES";
    $resultado = $this->connect()->query($query);
    $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
  }
  public function columnas($tabla)
  {
    $query = "SHOW COLUMNS FROM $tabla";
    $resultado = $this->connect()->query($query);
    $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
  }
}