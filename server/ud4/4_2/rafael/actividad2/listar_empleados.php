<?php
require_once '../actividad1/config.php'; // Aquí ya se crea $pdo automáticamente y se establece conexión

try {
    if (!isset($pdo)) {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Error de conexión");
}

// Consulta
try {
    $sql = "SELECT id, nombre, puesto, salario FROM empleados ORDER BY nombre";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $empleados = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
    $empleados = [];
}
?>
<!DOCTYPE html>
<!-- HTML -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <style>
        /* CSS */
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            color: #000000ff;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
        }
        .salario {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Lista de Empleados</h1>
    <!-- tabla de empleados -->
    <?php if (!empty($empleados)): ?>
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
                        <td><?= htmlspecialchars($empleado['id']); ?></td>
                        <td><?= htmlspecialchars($empleado['nombre']); ?></td>
                        <td><?= htmlspecialchars($empleado['puesto']); ?></td>
                        <td class="salario"><?= number_format($empleado['salario'], 2); ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><strong>Total de empleados:</strong> <?= count($empleados); ?></p>
    <?php else: ?>
        <div class="no-data">
            <p>No hay empleados registrados en la base de datos.</p>
        </div>
    <?php endif; ?>
</body>
</html>
