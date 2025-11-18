<?php
// actividad1/conexion.php

// 1. Incluimos el archivo de configuración
require_once 'config.php';

try {
    // 2. DSN (Data Source Name)
    // Define el tipo de BBDD, host, nombre de la BBDD y charset
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

    // 3. Opciones de PDO
    // Aquí configuramos el modo de error para que lance excepciones (ERRMODE_EXCEPTION)
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Opcional: define el modo de fetch por defecto
        PDO::ATTR_EMULATE_PREPARES   => false,          // Opcional: para consultas preparadas nativas
    ];

    // 4. Crear la instancia de PDO
    // Intentamos crear la conexión
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);

    // 5. Mensaje de éxito
    echo "¡Conexión a la base de datos 'empresa' establecida con éxito!";

} catch (PDOException $e) {
    // 6. Manejo de errores
    // Si algo falla (try), se captura aquí (catch)
    echo "Error en la conexión: " . $e->getMessage();
    // En una aplicación real, no mostrarías el error detallado al usuario
    // lo guardarías en un log.
}

// 7. Prueba de error (Consejo)
// Para probar el 'catch', ve a config.php y cambia DB_PASS por "contraseña_incorrecta".
// Recarga esta página y verás el mensaje de error de PDO.
?>