<?php

/**
 * CONFIGURACIÓN DE LA BBDD
 * 
 * Este archivo contiene las constantes de configuración para la conexión PDO.
 * Usar constantes en lugar de variables previene modificaciones.
 * 
 * IMPORTANTE: En producción, estas credenciales deberían estar en variables
 * de entorno o un archivo .env fuera del document root.
 */

//! Configuración del servidor de base de datos
define('DB_HOST', 'localhost');
define('DB_PORT', '3306'); // Puerto por defecto de MySQL

//! Credenciales de acceso
define('DB_NAME', 'empresa2');
define('DB_USER', 'root');
define('DB_PASS', ''); // En XAMPP por defecto está vacía

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
 * 
 * Estas opciones establecen el comportamiento de PDO:
 * - ERRMODE_EXCEPTION: Lanza excepciones en caso de error
 * - DEFAULT_FETCH_MODE: Retorna arrays asociativos por defecto
 * - EMULATE_PREPARES: Desactiva la emulación para usar prepared statements reales
 */
define('DB_OPTIONS', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
]);
