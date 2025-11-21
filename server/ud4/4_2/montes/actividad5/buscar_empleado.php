<?php

/**
 * =================================================================
 * CONTROLADOR: buscar_empleado.php
 * =================================================================
 *
 * Responsabilidades:
 * 1. Incluir la conexión.
 * 2. Preparar variables ($resultados, $error, $busqueda).
 * 3. Comprobar si es POST y ejecutar la consulta SEGURA.
 * 4. Al final, incluir la VISTA para "pintar" los datos.
 */

//! Incluir la conexión
require_once __DIR__ . '/conexion.php';

//! Varibles
$resultados = [];
$error = null;
$busqueda = '';

//! Logica para procesar el formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $busqueda = trim($_POST['nombre' ?? '']);
        if (empty($busqueda)) {
            $error = "Por favor,introduce un nombre para buscar";
        } else {
            $pdo = getConnection();

            $sql = "SELECT id, nombre, puesto, salario FROM empleados WHERE nombre LIKE :nombre";

            $stmt = $pdo->prepare($sql);
            $termino_like = "%" . $busqueda . "%";
            $stmt->bindParam(':nombre', $termino_like, PDO::PARAM_STR);

            $stmt->execute();
            $resultados = $stmt->fetchAll();
        }
    } catch (PDOException $e) {
        $error = "Error al ejecutar la consulta: " . $e->getMessage();
    } catch (Exception $e) {
        $error = "Error inesperado: " . $e->getMessage();
    }
}

/**
 * =================================================================
 * CARGA DE LA VISTA
 * =================================================================
 * 
 */

require_once __DIR__ . '/templates/buscar_empleado_vista.php';