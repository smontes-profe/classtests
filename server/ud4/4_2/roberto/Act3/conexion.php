<?php
// actividad2/conexion.php (y para 3, 4, 5, 6)

// Incluimos la configuración
require_once 'config.php';

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Creamos la conexión y la guardamos en la variable $pdo
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    // Si hay un error, matamos la ejecución y mostramos el error
    // En un sitio real, esto se manejaría de forma más elegante (logs)
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// ¡Importante! Este script no devuelve nada (echo), 
// pero la variable $pdo ya está disponible para cualquier script que lo incluya.
// Opcionalmente, podrías hacer que esta conexión sea una función que retorna $pdo.
// Por simplicidad, la dejaremos así.
?>