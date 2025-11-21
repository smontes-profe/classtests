<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'empresa');
define('DB_PORT', 3307);
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');
// DSN completo
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
try {
    // Crear la conexión con PDO
    $conn = new PDO($dsn, DB_USER, DB_PASS);
    // Configurar modo de errores para excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
