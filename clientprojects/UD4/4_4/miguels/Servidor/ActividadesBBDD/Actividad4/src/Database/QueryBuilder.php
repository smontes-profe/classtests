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
    
   
    public function insert(string $tableName, array $data): bool
    {
        $keys = array_keys($data);
        $columns = implode(', ', $keys);
        $placeholders = ':' . implode(', :', $keys);

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";

        try {
            $stmt = $this->pdo->prepare($sql);
            
            foreach ($data as $key => $value) {
              
                $stmt->bindValue(":$key", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
            }

            return $stmt->execute();
            
        } catch (\PDOException $e) {
            throw new \Exception("Error al insertar el registro: " . $e->getMessage());
        }
    }
    
   
    public function checkEmailExists(string $email): bool
    {
        $sql = "SELECT COUNT(*) FROM usuarios WHERE email = :email";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchColumn() > 0;
            
        } catch (\PDOException $e) {
            throw new \Exception("Error al verificar el email: " . $e->getMessage());
        }
    }
}