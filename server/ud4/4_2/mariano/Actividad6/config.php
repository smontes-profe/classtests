<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'empresa');
define('DB_PORT', 3307);
define('DB_USER', 'root');
define('DB_PASS', '');

// En lugar de define(PDO_OPTIONS, [...]) usamos una variable PHP normal:
$PDO_OPTIONS = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// Probar conexión (opcional, puedes quitar esto si ya ves el mensaje)
try {
    $pdo_test = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, $PDO_OPTIONS);
    echo "Conexión exitosa a la base de datos.<br>";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
