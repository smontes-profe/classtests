<?php

//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';

try {
    //Conecto con la base de datos
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Hago una consulta para obtener todos los empleados
    $stmt = $pdo->query("SELECT * FROM empleados");

    //Guardo los resultados en un array para poder usarlos en la tabla
    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    //Muestro error si hay algun error con la base de datos
    die("Error de conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados</title>
    <script>
        //Hago esta funcion para que el usuario pueda confirmar que quiere eliminar
        function confirmarEliminar(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este empleado?")) {
                //Si confirma se le reedirige a eliminar_empleado
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
                <!--Enlace para poder editar al empleado-->
                <a href="editar_empleado.php?id=<?= $empleado['id'] ?>">Editar</a>
            </td>
            <td>
                <!--Enlace para poder eliminar al empleado-->
                <a href="#" onclick="confirmarEliminar(<?= $empleado['id'] ?>)">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>