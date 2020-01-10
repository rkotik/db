<?php

$archivo = "config.ini";

$contenido = parse_ini_file($archivo, true);

// URL de la aplicación.accordion
define("URL", $contenido['url']['URL']);


// Define las constantes para el acceso a la base de datos
define("HOST", $contenido['database']['HOST']);
define("USER", $contenido['database']['USER']);
define("PASS", $contenido['database']['PASS']);
define("NAME", $contenido['database']['NAME']);
define("CHARSET", $contenido['database']['CHARSET']);

// Define las variables de errores de PHP
error_reporting($contenido['errores']['REPORTES']);