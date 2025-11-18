<?php

namespace actividad2\repository;

use actividad2\model\Empleado;
use PDO;

/**
 * Repositorio para gestionar la entidad Empleado.
 */

class EmpleadoRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Obtiene todos lo empleados ordenados por nombre
     * 
     * @return Empleado[] Un array de objetos Empleado.
     */

    public function findAll(): array {
        $sql= "SELECT id, nombre, puesto, salario FROM empleados ORDER BY nombre ASC";
        
        $stmt= $this-> pdo -> query($sql);

        return $stmt -> fetchALL (PDO::FETCH_CLASS, Empleado::class);
    }
    //* Aqui podriamos añadir otros metodos. 
}
