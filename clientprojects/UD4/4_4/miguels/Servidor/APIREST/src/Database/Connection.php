<?php

namespace Database;

use Config\Database;
use App\Database\ConnectionInterface;
use PDO;
use PDOException;

class Connection implements ConnectionInterface
{

    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }


    public function getConnection(): PDO
    {

        $driver = $this->config['DB_DRIVER'] ?? 'mysql';
        $host = $this->config['DB_HOST'];
        $port = $this->config['DB_PORT'] ?? 3306;
        $dbName = $this->config['DB_NAME'];
        $user = $this->config['DB_USER'];
        $pass = $this->config['DB_PASS'] ?? '';
        $charset = $this->config['DB_CHARSET'] ?? 'utf8mb4';

        // Construimos el Data Source Name (DSN) para la conexión PDO
        // Incluye el driver, host, puerto, nombre de la BD y charset
        $dsn = "{$driver}:host={$host};port={$port};dbname={$dbName};charset={$charset}";

        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e) {
            throw new \Exception(("Error en la conexión en la base de datos" . $e->getMessage()));
        }
    }
}
