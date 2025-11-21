<?php
// 1. Incluir la conexión
// Esto ejecuta el código de conexion.php y nos deja la variable $pdo lista para usar.
require_once 'conexion.php';

$mensaje = ""; // Para mensajes de estado

try {
    // 2. Preparar la consulta SQL (¡sin parámetros, se puede usar query!)
    $sql = "SELECT id, nombre, puesto, salario FROM empleados";

    // 3. Ejecutar la consulta
    // Usamos query() porque no hay datos de usuario. Es seguro.
    $stmt = $pdo->query($sql);

    // 4. Comprobar si hay resultados
    if ($stmt->rowCount() > 0) {
        // Hay empleados, los guardamos en un array
        $empleados = $stmt->fetchAll();
    } else {
        // No hay empleados
        $empleados = []; // Array vacío
        $mensaje = "No se encontraron empleados en la base de datos.";
    }

} catch (PDOException $e) {
    // Capturar cualquier error de la base de datos
    $mensaje = "Error al consultar la base de datos: " . $e->getMessage();
    $empleados = []; // Asegurarse de que es un array para el HTML
}

// 5. Cerrar la conexión (liberar recursos)
$stmt = null;
$pdo = null;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <style>
        /* Estilos básicos para la tabla */
        table { width: 80%; border-collapse: collapse; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .mensaje { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>

    <h1 style="text-align:center;">Listado de Empleados</h1>

    <?php if ($mensaje): ?>
        <p class="mensaje"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <?php if (!empty($empleados)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['salario']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (empty($mensaje)): ?>
        <p class="mensaje">No hay empleados para mostrar.</p>
    <?php endif; ?>

</body>
</html>