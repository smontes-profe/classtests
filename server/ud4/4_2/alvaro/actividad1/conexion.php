<?php
// Traemos el archivo con los datos de la BBDD (usuario, pass, etc.)
require_once 'config.php';

// Preparamos la cadena de conexión (DSN)
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

// Usamos try...catch para intentar conectar y capturar errores
try {
    // Creamos la conexión a la base de datos
    $pdo = new PDO($dsn, DB_USER, DB_PASS);

    // Configuramos PDO para que nos diga los errores (lanza excepciones)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "¡Conexión exitosa a la base de datos 'empresa'!";
} catch (PDOException $e) {
    // Si algo falla en el 'try', lo capturamos aquí
    echo "Error en la conexión: " . $e->getMessage();
}
