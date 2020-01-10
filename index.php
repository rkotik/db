<?php

require_once 'clases/backup.php';

function tablas()
{
  $query = new Backup;
  $tablas = $query->tablas();

  foreach ($tablas as $tabla) {
    backup($tabla['Tables_in_' . NAME]);
  }
}


function backup($tabla)
{
  $query = new Backup;
  $columnas = $query->columnas($tabla);
  echo "<p>Realizando backup de la tabla: {$tabla}</p>";
  foreach ($columnas as $columna) {
    echo $columna['Field'] . "<br>";
  }
}

$query = new Backup;
$columnas = $query->columnas('cert_pyme');
echo '<pre>';
var_dump($columnas);
echo '</pre>';

foreach ($columnas as $columna) {
  echo $columna['Field'] . " " . $columna['Type'] . " " . ($columna['Null'] == 'NO' ? 'NOT NULL' : '') . " " . ($columna['Key'] == 'PRI' ? 'Primary Key' : '') . " " . ($columna['Default'] != null ? $columna['Default'] : '') . "<br/>";
}

tablas();