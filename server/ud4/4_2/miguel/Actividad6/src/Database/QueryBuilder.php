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

    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ?: null;
        } catch (\PDOException $e) {
            throw new \Exception("Error al buscar por email: " . $e->getMessage());
        }
    }

    public function all(string $tableName): array
    {
        $sql = "SELECT id, nombre_usuario, email FROM {$tableName} ORDER BY id DESC";

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
        $sql = "SELECT id, nombre_usuario, email FROM {$tableName} WHERE id = :id";
        
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

    public function insert(string $tableName, array $data): bool
    {
        $keys = array_keys($data);
        $columns = implode(', ', $keys);
        $placeholders = ':' . implode(', :', $keys);
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";

        try {
            $stmt = $this->pdo->prepare($sql);
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
            }
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception("Error al insertar el registro: " . $e->getMessage());
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
                $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
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