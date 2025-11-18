<?php

namespace actividad2\config;

use PDO;
use PDOException;
use RuntimeException;


class Database
{
    private static ?PDO $instance = null;

    //! Constructor privado para prevenir la instalación directa.
    private function __construct() {}
    //! Previene la clonacion de una instancia. 
    private function __clone() {}
    //! Previene la desializacion. (Alarma de la caja fuerte)
    private function __wakeup()
    {
        throw new RuntimeException("No se puede dearializar una instancia Singleton.");
    }

    /**
     * Se obtine la instancia única de PDO.
     * Carga la varibles de entorno para crear la conexión.
     * 
     * @return PDO
     */

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {  //? Comprueba que si te has conectado a tu sessión 
            // Cargar varibles de entorno 
            $host = $_ENV['DB_HOST'] ?? 'localhost';
            $port = $_ENV['DB_PORT'] ?? '3306';
            $db = $_ENV['DB_NAME'] ?? 'test';
            $user = $_ENV['DB_USER'] ?? 'root';
            $pass = $_ENV['DB_PASS'] ?? '';
            $charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';

            $dns = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];


            try {
                self::$instance = new PDO($dns, $user, $pass, $options);
            } catch (PDOException $e) {
                //* Para un entorno real XD
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
        return self::$instance;
    }
}
