<?php
// (Incluir conexion.php y el bloque try/catch para obtener $empleados)
// ... (copia el bloque PHP de listar_empleados.php de la Actividad 2)
require_once 'conexion.php';
$mensaje = "";
try {
    $sql = "SELECT id, nombre, puesto, salario FROM empleados";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        $empleados = $stmt->fetchAll();
    } else {
        $empleados = [];
        $mensaje = "No se encontraron empleados.";
    }
} catch (PDOException $e) {
    $mensaje = "Error: " . $e->getMessage();
    $empleados = [];
}
$stmt = null;
// $pdo = null; // No cerramos $pdo aquí si lo necesitamos más abajo (aunque en este script no)

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados (CRUD)</title>
    <style>
        /* (Mismos estilos de tabla) */
        table { width: 90%; border-collapse: collapse; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .accion-btn { display: inline-block; padding: 5px 10px; text-decoration: none; border-radius: 4px; color: white; }
        .editar-btn { background-color: #ffc107; /* Amarillo */ }
        .eliminar-btn { background-color: #dc3545; /* Rojo */ }
    </style>
</head>
<body>

    <h1 style="text-align:center;">Gestión de Empleados</h1>
    
    <?php if (!empty($empleados)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                    <th>Acciones</th> </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['salario']); ?></td>
                        <td>
                            <a href="editar_empleado.php?id=<?php echo $empleado['id']; ?>" class="accion-btn editar-btn">Editar</a>
                            
                            <a href="eliminar_empleado.php?id=<?php echo $empleado['id']; ?>" 
                               class="accion-btn eliminar-btn"
                               onclick="return confirm('¿Estás seguro de que quieres eliminar a este empleado?');">
                               Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>