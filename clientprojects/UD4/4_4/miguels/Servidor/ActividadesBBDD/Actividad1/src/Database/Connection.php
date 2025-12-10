<?php

namespace Database;

use Config\Database;
use App\Database\ConnectionInterface;
use PDO;
use PDOException;

class Connection implements ConnectionInterface
{
    private array $config;

    // Constructor que recibe la configuración de la base de datos
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    // Método para obtener la conexión PDO, devuelve una instancia de PDO
    public function getConnection(): PDO
    {

        // Construcción del DSN (Data Source Name)
        $driver = $this->config['DB_DRIVER'] ?? 'mysql';
        $host = $this->config['DB_HOST'];
        $port = $this->config['DB_PORT'] ?? 3306;
        $dbName = $this->config['DB_NAME'];
        $user = $this->config['DB_USER'];
        $pass = $this->config['DB_PASS'] ?? '';
        $charset = $this->config['DB_CHARSET'] ?? 'utf8mb4';

        $dsn = "{$driver}:host={$host};port={$port};dbname={$dbName};charset={$charset}";

        try {
            $pdo = new PDO($dsn, $user, $pass);
            // Configurar el modo de error de PDO a excepción
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
            
        } catch (PDOException $e) {
            throw new \Exception("Error de conexión a BBDD: " . $e->getMessage());
        }
    }
}
