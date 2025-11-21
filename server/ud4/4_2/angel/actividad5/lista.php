<?php
require_once "../actividad1/config.php";

try {
    // Conexión a la base de datos
    $conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si llega petición GET con 'eliminar', borrar el empleado
    if (isset($_GET['eliminar'])) {
        $id = (int) $_GET['eliminar'];

        $sql = "DELETE FROM empleados WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Obtener todos los empleados
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
    <title>Lista de Empleados</title>
    <script>
        // Confirmación antes de eliminar
        function confirmarEliminacion(id) {
            if (confirm("¿Seguro que deseas eliminar este empleado?")) {
                window.location.href = "lista.php?eliminar=" + id;
            }
        }
    </script>
</head>

<body>

    <h2>Lista de Empleados</h2>

    <?php if (count($empleados) > 0): ?>
        <table border="1" cellpadding="5">
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
                    <td><a href="eempleado.php?id=<?= $empleado['id'] ?>">Editar</a></td>
                    <td><a href="#" onclick="confirmarEliminacion(<?= $empleado['id'] ?>)">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No hay empleados registrados.</p>
    <?php endif; ?>

</body>

</html>