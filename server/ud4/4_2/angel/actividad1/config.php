<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'empresa');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');
// DSN completo
$dsn = "mysql:host=" . DB_HOST .
";dbname=" . DB_NAME .
";charset=" . DB_CHARSET;
?>