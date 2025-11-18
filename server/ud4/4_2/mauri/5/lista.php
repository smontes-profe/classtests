<?php

// Config: cargar parámetros de conexión
require_once __DIR__ . '/../1/config.php';

// Obtener todos los empleados de la BBDD
try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT * FROM empleados");
    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados</title>
    <script>
        // Confirmación simple antes de eliminar
        function confirmarEliminar(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este empleado?")) {
                window.location = "eliminar_empleado.php?id=" + id;
            }
        }
    </script>
</head>
<body>
    <h1>Lista de Empleados</h1>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Puesto</th>
            <th>Salario</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($empleados as $empleado): ?>
        <tr>
            <td><?= htmlspecialchars($empleado['id']) ?></td>
            <td><?= htmlspecialchars($empleado['nombre']) ?></td>
            <td><?= htmlspecialchars($empleado['puesto']) ?></td>
            <td><?= htmlspecialchars($empleado['salario']) ?></td>
            <td>
                <a href="editar_empleado.php?id=<?= $empleado['id'] ?>">Editar</a>
            </td>
            <td>
                <a href="#" onclick="confirmarEliminar(<?= $empleado['id'] ?>)">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>