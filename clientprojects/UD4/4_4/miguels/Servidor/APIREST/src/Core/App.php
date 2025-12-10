<?php

namespace Core;

use Config\Database;
use Database\Connection;
use Database\QueryBuilder;
use PDO;

class App
{
    private static array $registry = [];

    /**
     * Obtiene una instancia del servicio solicitado del contenedor.
     * Implementa un patrón de carga perezosa (Lazy Loading): solo se crea si no existe.
     * 
     * @param string $key Nombre del servicio (ej. 'PDO', 'QueryBuilder')
     * @return mixed La instancia del servicio
     */
    public static function get(string $key)
    {
        if (!isset(self::$registry[$key])) {
            self::$registry[$key] = self::build($key);
        }
        return self::$registry[$key];
    }

    private static function build(string $key)
    {
        switch ($key) {
            case 'PDO':
                $config = Database::getAll();
                $connection = new Connection($config);
                return $connection->getConnection();

            case 'QueryBuilder':
                $pdo = self::get('PDO');
                return new QueryBuilder($pdo);

            default:
                throw new \Exception("No se encontró el servicio {$key} en el contenedor.");
        }
    }
}
