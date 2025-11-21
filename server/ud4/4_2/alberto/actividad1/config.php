<?php
//DECLARO LOS ATRIBUTOS DE LA BASE DE DATOS COMO CONSTANTES
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'empresa');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

$dsn = "mysql:host=" . DB_HOST .
";dbname=" . DB_NAME .
";charset=" . DB_CHARSET;
?>