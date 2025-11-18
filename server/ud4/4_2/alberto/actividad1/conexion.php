<?php
// separo conexion de config para poder reutilizar config.php
require_once __DIR__ .'/config.php';

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    echo "Conexión exitosa a la BD.";
} catch (PDOException $e) {
    echo "Error de conexión: " . htmlspecialchars($e->getMessage());
   
}

//http://localhost/2do_servidor/ud4/actividad1/conexion.php