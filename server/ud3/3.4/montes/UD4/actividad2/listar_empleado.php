<?php
/**
 * =================================================================
 * BLOQUE DE LÓGICA (Controlador)
 * =================================================================
 *
 * Responsabilidades:
 * 1. Incluir la conexión.
 * 2. Preparar variables.
 * 3. Ejecutar la consulta contra la BBDD.
 * 4. Manejar errores de consulta.
 * 5. Almacenar resultados en variables para la vista.
 */

// 1. Incluir la conexión (esto nos da la función getConnection())
require_once __DIR__ . '/conexion.php';

// 2. Preparar variables que usará la vista
$empleados = [];
$error = null;

try {
    // 3. Obtener la conexión
    $pdo = getConnection();
    
    // 4. Ejecutar la consulta
    $sql = "SELECT id, nombre, puesto, salario FROM empleados ORDER BY nombre ASC";
    $stmt = $pdo->query($sql);
    
    // 5. Almacenar resultados (ya viene como FETCH_ASSOC desde config.php)
    $empleados = $stmt->fetchAll(); 
    
} catch (PDOException $e) {
    // 4. Manejar errores de CONSULTA
    $error = "Error al ejecutar la consulta: " . $e->getMessage();
} catch (Exception $e) {
    $error = "Error inesperado: " . $e->getMessage();
}

/**
 * =================================================================
 * BLOQUE DE PRESENTACIÓN (Vista)
 * =================================================================
 *
 * Responsabilidades:
 * 1. Mostrar el HTML.
 * 2. Comprobar si hay errores y mostrarlos.
 * 3. Comprobar si hay datos y mostrarlos (o un mensaje de "vacío").
 * 4. Usar htmlspecialchars() para prevenir XSS.
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados (Empresa2)</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #e9ecef; }
        .empty-message { text-align: center; color: #777; background-color: #fdfdfe; padding: 20px; border: 1px dashed #ddd; }
        .error-message { color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>

    <h1>Listado de Empleados</h1>

    <?php // --- Renderizado condicional --- ?>

    <?php if ($error): ?>
        
        <div class="error-message">
            <strong>Error:</strong> <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
        </div>

    <?php elseif (empty($empleados)): ?>
        
        <div class="empty-message">
            No se encontraron empleados registrados.
        </div>

    <?php else: ?>
    
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?php echo $empleado['id']; ?></td>
                        
                        <td><?php echo htmlspecialchars($empleado['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($empleado['puesto'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                        
                        <td><?php echo number_format($empleado['salario'], 2, ',', '.'); ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    <?php endif; ?>
    <?php // --- Fin renderizado condicional --- ?>

</body>
</html>