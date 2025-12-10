<?php

namespace Core;

use Config\DatabaseAct6;
use Database\ConnectionAct6;
use Database\QueryBuilder;
use PDO;

class App
{
    // Contenedor de servicios simple
    private static array $registry = [];

    // Obtener una instancia del servicio solicitado, el paramámetro $key indica el servicio requerido
    public static function get(string $key)
    {
        // Si el servicio no está registrado, lo construimos
        if (!isset(self::$registry[$key])) {
            // Agregar la instancia al contenedor
            self::$registry[$key] = self::build($key);
        }
        // Devolver la instancia del servicio
        return self::$registry[$key];
    }

    // Construir la instancia del servicio
    private static function build(string $key)
    {
        switch ($key) {
            // Definir los servicios disponibles de acceso a datos
            case 'PDO':
                // Obtener configuración de la base de datos
                $config = DatabaseAct6::getAll();
                $connection = new ConnectionAct6($config);
                return $connection->getConnection();
            
                // Agregar más servicios según sea necesario    
            case 'QueryBuilder':
                $pdo = self::get('PDO');
                return new QueryBuilder($pdo);
                
            default:
                throw new \Exception("No se encontró el servicio {$key} en el contenedor.");
        }
    }
}