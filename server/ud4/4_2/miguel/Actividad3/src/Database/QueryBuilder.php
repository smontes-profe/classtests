<?php

namespace Database;

use PDO;
use PDOStatement;
use Exception;

class QueryBuilder
{

    private PDO $pdo;

    private string $table = 'empleados';
    private array $columns = ['*'];
    private string $whereClause = '';
    private array $params = [];

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function whereNombreLike(string $nombreForm): self
    {

        $marcador = 'nombre';

        $this->whereClause = " WHERE nombre LIKE :{$marcador}";
        $this->params[$marcador] = "%{$nombreForm}%";

        return $this;
    }


    public function get(): array
    {

        if (empty($this->table)) {
            throw new Exception("No se ha espeficado la tabla para realizar la consulta");
        }

        $cols = implode(', ', $this->columns);

        $sql = "SELECT {$cols} FROM {$this->table} {$this->whereClause}";

        try {
            $stmt = $this->pdo->prepare($sql);

            if (!empty($this->params)) {

                foreach ($this->params as $key => $val) {
                    $stmt->bindParam(":$key", $this->params[$key], PDO::PARAM_STR);
                }
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new Exception("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }
}
