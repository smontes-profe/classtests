<?php
/**
 * =================================================================
 * CONTROLADOR: eliminar_empleado.php
 * =================================================================
 *
 * Responsabilidades:
 * 1. Incluir la conexión.
 * 2. Obtener y validar el ID de la URL.
 * 3. Ejecutar un DELETE preparado.
 * 4. Redirigir de vuelta a la lista.
 */

// 1. Incluir la conexión
require_once __DIR__ . '/conexion.php';

// 2. Obtener y validar el ID de la URL
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Si no hay ID o no es válido, no hacemos nada y volvemos
if (!$id) {
    header("Location: lista.php");
    exit;
}

try {
    // 3. Ejecutar DELETE preparado
    $pdo = getConnection();
    
    $sql = "DELETE FROM empleados WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
} catch (PDOException $e) {
    // Opcional: Manejar el error
    // En una app real, guardaríamos el error en una sesión
    // y lo mostraríamos en lista.php
    // Por simplicidad, solo detenemos la ejecución.
    die("Error al eliminar el empleado: " . $e->getMessage());
}

// 4. Redirigir de vuelta a la lista
// Si todo fue bien, el usuario vuelve a la lista actualizada.
header("Location: lista.php");
exit;