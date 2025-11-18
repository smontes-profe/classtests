<?php
require_once "../actividad1/config.php";

try {
    // Crear conexión con PDO
    $conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL
    $sql = "SELECT * FROM empleados";
    $stmt = $conexion->query($sql);
    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
</head>

<body>

    <h2>Listado de Empleados</h2>

    <?php if (count($empleados) > 0): ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Salario</th>
            </tr>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?= htmlspecialchars($empleado['id']) ?></td>
                    <td><?= htmlspecialchars($empleado['nombre']) ?></td>
                    <td><?= htmlspecialchars($empleado['puesto']) ?></td>
                    <td><?= htmlspecialchars($empleado['salario']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No hay empleados registrados.</p>
    <?php endif; ?>

</body>

</html>