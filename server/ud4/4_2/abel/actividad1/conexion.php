<?php

require_once 'config.php';

try {
    // Crear conexión PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $contraseña);

    // Establecer modo de errores de PDO a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa a la base de datos $dbname.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
