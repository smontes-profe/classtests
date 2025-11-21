<?php

namespace Database;

use PDO;
use PDOStatement;

class QueryBuilder
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all(string $tableName): array
    {
        $sql = "SELECT id, nombre, puesto, salario FROM {$tableName} ORDER BY id DESC";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception("Error al listar registros: " . $e->getMessage());
        }
    }
    
    public function find(string $tableName, int $id): ?array
    {
        $sql = "SELECT id, nombre, puesto, salario FROM {$tableName} WHERE id = :id";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result ?: null;
        } catch (\PDOException $e) {
            throw new \Exception("Error al encontrar el registro: " . $e->getMessage());
        }
    }

    public function update(string $tableName, int $id, array $data): bool
    {
        $setClauses = [];
        foreach (array_keys($data) as $key) {
            $setClauses[] = "{$key} = :{$key}";
        }
        $set = implode(', ', $setClauses);

        $sql = "UPDATE {$tableName} SET {$set} WHERE id = :id";

        try {
            $stmt = $this->pdo->prepare($sql);
            
            foreach ($data as $key => $value) {
                $type = is_int($value) ? PDO::PARAM_INT : (is_float($value) ? PDO::PARAM_STR : PDO::PARAM_STR);
                $stmt->bindValue(":$key", $value, $type);
            }
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();

        } catch (\PDOException $e) {
            throw new \Exception("Error al actualizar el registro: " . $e->getMessage());
        }
    }

    public function delete(string $tableName, int $id): bool
    {
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
            return $stmt->execute();

        } catch (\PDOException $e) {
            throw new \Exception("Error al eliminar el registro: " . $e->getMessage());
        }
    }
}