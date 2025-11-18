<?php
// Mostramos errores para ayudarnos a depurar
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluimos la configuración de la BBDD
require_once 'config.php';

// Preparamos las variables
$empleados = [];
$error_message = '';

try {
    // 1. Conectar a la BBDD
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Preparar y ejecutar la consulta (igual que en Act 2)
    $sql = "SELECT id, nombre, puesto, salario FROM empleados";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // 3. Recoger los resultados
    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Capturar cualquier error de conexión o consulta
    $error_message = "Error al consultar la base de datos: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 5: CRUD de Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .empty {
            color: #888;
        }

        /* Estilos para los "botones" de acción */
        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin: 2px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .btn-editar {
            background-color: #007bff;
        }

        .btn-eliminar {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <h2>Actividad 5: CRUD de Empleados</h2>
    <p>Listado de empleados con opciones para Editar y Eliminar.</p>

    <?php // --- Lógica para mostrar resultados --- 
    ?>
    <?php if ($error_message): ?>
        <p class="error"><?= htmlspecialchars($error_message) ?></p>
    <?php elseif (count($empleados) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?= htmlspecialchars($empleado['id']) ?></td>
                        <td><?= htmlspecialchars($empleado['nombre']) ?></td>
                        <td><?= htmlspecialchars($empleado['puesto']) ?></td>
                        <td><?= htmlspecialchars($empleado['salario']) ?></td>
                        <td>
                            <a href="eempleado.php?id=<?= htmlspecialchars($empleado['id']) ?>" class="btn btn-editar">Editar</a>
                            <a href="eliminar_empleado.php?id=<?= htmlspecialchars($empleado['id']) ?>"
                                class="btn btn-eliminar"
                                onclick="return confirm('¿Estás seguro de que quieres eliminar a este empleado?');">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="empty">No se encontraron empleados en la base de datos.</p>
    <?php endif; ?>
</body>

</html>