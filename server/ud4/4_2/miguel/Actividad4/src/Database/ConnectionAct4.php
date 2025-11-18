<?php

namespace Database;

use Config\DatabaseAct4;
use App\Database\ConnectionInterfaceAct4;
use PDO;
use PDOException;

class ConnectionAct4 implements ConnectionInterfaceAct4
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
