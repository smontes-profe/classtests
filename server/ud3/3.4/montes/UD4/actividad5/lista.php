<?php
/**
 * =================================================================
 * CONTROLADOR: lista.php
 * =================================================================
 *
 * Responsabilidades:
 * 1. Incluir la conexión.
 * 2. Obtener TODOS los empleados de la BBDD.
 * 3. Manejar errores de consulta.
 * 4. Cargar la vista que pintará la tabla.
 */

// 1. Incluir la conexión
require_once __DIR__ . '/conexion.php';

// 2. Preparar variables
$empleados = [];
$error = null;

try {
    // 3. Obtener conexión y ejecutar consulta
    $pdo = getConnection();
    
    $sql = "SELECT id, nombre, puesto, salario FROM empleados ORDER BY nombre ASC";
    $stmt = $pdo->query($sql);
    
    $empleados = $stmt->fetchAll();
    
} catch (PDOException $e) {
    $error = "Error al obtener la lista de empleados: " . $e->getMessage();
}

/**
 * =================================================================
 * CARGA DE LA VISTA
 * =================================================================
 */
require_once __DIR__ . '/templates/lista_vista.php';