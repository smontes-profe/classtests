<?php
/**
 * =================================================================
 * CONTROLADOR: editar_empleado.php (eempleado.php)
 * =================================================================
 *
 * Responsabilidades:
 * 1. Incluir la conexión.
 * 2. Obtener el ID del empleado desde la URL (GET).
 * 3. Si es POST (formulario enviado):
 * a. Validar datos.
 * b. Ejecutar UPDATE preparado.
 * 4. Si es GET (o después de POST):
 * a. Obtener datos frescos del empleado de la BBDD.
 * 5. Cargar la vista con el formulario.
 */

// 1. Incluir la conexión
require_once __DIR__ . '/conexion.php';

// 2. Preparar variables
$empleado = null;
$error = null;
$success = null;

// 3. Obtener y validar el ID de la URL
// Usamos filter_input para limpiar el ID (buena práctica)
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die("Error: ID de empleado no válido.");
}

try {
    // 4. Obtener la conexión
    $pdo = getConnection();
    
    // 5. Lógica POST (Si se envió el formulario de actualización)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // 5a. Recoger y validar datos del formulario
        $nombre = trim($_POST['nombre'] ?? '');
        $puesto = trim($_POST['puesto'] ?? '');
        // filter_var es más robusto para números
        $salario = filter_var($_POST['salario'] ?? 0, FILTER_VALIDATE_FLOAT);

        if (empty($nombre) || $salario === false) {
            throw new Exception("Nombre y Salario son obligatorios y el salario debe ser un número.");
        }

        // 5b. Ejecutar UPDATE preparado
        $sql_update = "UPDATE empleados 
                       SET nombre = :nombre, puesto = :puesto, salario = :salario 
                       WHERE id = :id";
        
        $stmt_update = $pdo->prepare($sql_update);
        
        $stmt_update->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt_update->bindParam(':puesto', $puesto, PDO::PARAM_STR);
        $stmt_update->bindParam(':salario', $salario); // PDO infiere el tipo
        $stmt_update->bindParam(':id', $id, PDO::PARAM_INT);
        
        $stmt_update->execute();
        
        $success = "Empleado actualizado correctamente.";
    }

    // 6. Lógica GET (Obtener datos para mostrar en el formulario)
    // Esto se ejecuta siempre (en GET, y después del POST)
    // para asegurar que el formulario muestra los datos más frescos.
    
    $sql_select = "SELECT id, nombre, puesto, salario FROM empleados WHERE id = :id";
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_select->execute();
    
    $empleado = $stmt_select->fetch();

    if (!$empleado) {
        throw new Exception("Empleado no encontrado con ese ID.");
    }
    
} catch (PDOException $e) {
    $error = "Error de base de datos: " . $e->getMessage();
} catch (Exception $e) {
    $error = "Error: " . $e->getMessage();
}

/**
 * =================================================================
 * CARGA DE LA VISTA
 * =================================================================
 */
require_once __DIR__ . '/templates/editar_empleado_vista.php';