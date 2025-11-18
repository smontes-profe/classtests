<?php 
namespace actividad2\model;

/**
 * Representa la entidad Empleado. 
 * La propiedades deben ser publicas para  que el PDO::Fetch_CLASS puedan ser asignadas.
 */

class Empleado{
public int $id;
public string $nombre;
public ?string $puesto; // Permite nulos
public float $salario;

/**
 * Opcional: método para formatear salario 
 */
public function getSalarioFormateado(): string{
    return number_format($this -> salario, 2, ",",".") . " €";
}
public function getNombreSeguro(): string{
    return htmlspecialchars($this ->nombre, ENT_QUOTES, 'UTF-8');
}
public function getPuestoSeguro(): string{
    return htmlspecialchars($this -> puesto ?? 'N/A', ENT_QUOTES);
}
}