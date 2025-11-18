<?php
/**
 * CONFIGURACIÓN DE LA BBDD
 */

//! Configuración del servidor de base de datos
define('DB_HOST', 'localhost');
define('DB_PORT', '3306'); 

//! Credenciales de acceso
define('DB_NAME', 'empresa2'); // <-- ¡Asegúrate de que es empresa2!
define('DB_USER', 'root');
define('DB_PASS', ''); 

//! Configuración de charset
define('DB_CHARSET', 'utf8mb4');

//! DSN (Data Source Name) completo
define('DB_DSN', sprintf(
    'mysql:host=%s;port=%s;dbname=%s;charset=%s',
    DB_HOST,
    DB_PORT,
    DB_NAME,
    DB_CHARSET
));

/**
 * OPCIONES DE CONFIGURACIÓN DEL PDO
 */
define('DB_OPTIONS', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
]);