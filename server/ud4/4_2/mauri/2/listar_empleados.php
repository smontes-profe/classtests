<?php

// Cargar conexión (archivo que crea $pdo)
require_once '../1/conexion.php';

// Obtener todos los empleados
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query('SELECT * FROM empleados');
    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Error crítico de BBDD
    die('Error: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Lista de empleados</title>
    </head>
    <body>
        <h1>Empleados</h1>

        <!--Muestro un mensaje para cuando la tabla esta vacia-->
        <?php if (count($empleados) === 0): ?>
        <p>No hay ningun empleado registrado.</p>
        <?php else: ?>

        <!--Tabla para los datos del empleado-->
        <table border="1" cellpadding="6">
        <tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>
        <?php foreach ($empleados as $e): ?>
        <tr>
            <td><?= htmlspecialchars($e['id']) ?></td>
            <td><?= htmlspecialchars($e['nombre']) ?></td>
            <td><?= htmlspecialchars($e['puesto']) ?></td>
            <td><?= htmlspecialchars($e['salario']) ?></td>
        </tr>
        <?php endforeach; ?>
        </table>    
        <?php endif; ?>
    </body>
</html>