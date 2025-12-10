<?php

namespace Database;

use PDO;
use Exception;

class QueryBuilder
{

    private PDO $pdo;

    private string $table;
    private array $columns = ['*'];

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function table(string $tableName): self
    {
        $this->table = $tableName;

        return $this;
    }

    public function select(array $columns): self
    {
        $this->columns = $columns;
        return $this;
    }

    public function get(): array
    {

        if (empty($this->table)) {
            throw new Exception("No se ha espeficado la tabla para realizar la consulta");
        }

        $cols = implode(', ', $this->columns);

        $sql = "SELECT {$cols} FROM {$this->table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new Exception("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }
}
