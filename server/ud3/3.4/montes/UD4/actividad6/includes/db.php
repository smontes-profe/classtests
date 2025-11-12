<?php

/**
 * Archivo de Conexión a la Base de Datos.
 *
 * Incluye la configuración y crea la instancia PDO.
 * Esta instancia ($pdo) será usada por todos los demás scripts.
 */

// 1. Cargar la configuración
// __DIR__ es una constante mágica de PHP que da la ruta de la carpeta actual (includes/)
// Usamos __DIR__ para asegurarnos de que la ruta siempre funcione.
require_once __DIR__ . '/config.php';

// Variable para almacenar la conexión
$pdo = null;

// Opciones de PDO para una conexión robusta
$options = [
    // Queremos que PDO lance excepciones en lugar de errores silenciosos
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // Queremos que los resultados se devuelvan como arrays asociativos
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Desactiva la emulación de consultas preparadas (usar preparadas nativas)
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// DSN (Data Source Name) - La cadena de conexión
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

try {
    // 2. Crear la instancia de PDO
    // Esta es la variable que usaremos en todas nuestras consultas
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    // 3. Manejo de errores de conexión
    // Si la conexión falla (mala contraseña, BBDD no existe),
    // detenemos la aplicación y mostramos un error amigable.
    // NUNCA muestres el error detallado ($e->getMessage()) en producción.
    error_log("Error de conexión PDO: " . $e->getMessage()); // Log para el admin
    die("Error: No se pudo conectar a la base de datos. Contacte al administrador.");
}
