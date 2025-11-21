<?php
// Mostramos errores para ayudarnos a depurar
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluimos la configuración de la BBDD
require_once 'config.php';

// Preparamos las variables que usaremos
$empleados = []; // Un array para guardar los resultados
$error_message = ''; // Un string para guardar posibles errores

try {
    // 1. Conectar a la BBDD
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Preparar la consulta SQL
    $sql = "SELECT id, nombre, puesto, salario FROM empleados";
    $stmt = $pdo->prepare($sql);

    // 3. Ejecutar la consulta
    $stmt->execute();

    // 4. Recoger los resultados
    // fetchAll() nos da todos los empleados en un array
    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Si algo falla en el 'try', lo capturamos
    $error_message = "Error al consultar la base de datos: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2: Listar Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 80%;
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
    </style>
</head>

<body>
    <h2>Actividad 2: Listado de Empleados</h2>

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
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?= htmlspecialchars($empleado['id']) ?></td>
                        <td><?= htmlspecialchars($empleado['nombre']) ?></td>
                        <td><?= htmlspecialchars($empleado['puesto']) ?></td>
                        <td><?= htmlspecialchars($empleado['salario']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="empty">No se encontraron empleados en la base de datos.</p>
    <?php endif; ?>
</body>

</html>