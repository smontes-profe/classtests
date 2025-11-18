<?php
require_once '../actividad1/config.php'; // Aquí ya se crea $pdo automáticamente y se establece conexión

$resultados = [];
$busqueda = '';

try {
    // Si la conexión $pdo no está creada
    if (!isset($pdo)) {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Error de conexión");
}

// Comprobar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar'])) {
    $busqueda = trim($_POST['buscar']);
    
    if (!empty($busqueda)) {
        try {
            // Consulta con parámetros
            $sql = "SELECT id, nombre, puesto, salario 
                    FROM empleados 
                    WHERE nombre LIKE :nombre 
                    ORDER BY nombre";
            
            $stmt = $pdo->prepare($sql);
            
            // Vincular el parámetro (añadimos % para búsqueda parcial)
            $parametro = '%' . $busqueda . '%';
            $stmt->bindParam(':nombre', $parametro, PDO::PARAM_STR);
            
            // Ejecutar la consulta
            $stmt->execute();
            $resultados = $stmt->fetchAll();
            
        } catch (PDOException $e) {
            $error = "Error en la búsqueda: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Empleado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #2196F3;
            padding-bottom: 10px;
        }
        .form-busqueda {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        input[type="text"] {
            padding: 10px;
            width: 70%;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0b7dda;
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
            background-color: #2196F3;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .no-resultados {
            text-align: center;
            padding: 20px;
            color: #666;
            background: #fff3cd;
            border-radius: 5px;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .info {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>🔍 Buscar Empleado</h1>
    
    <div class="form-busqueda">
        <form method="POST" action="">
            <input type="text" 
                   name="buscar" 
                   placeholder="Introduce el nombre del empleado..." 
                   value="<?php echo htmlspecialchars($busqueda); ?>"
                   required>
            <button type="submit">Buscar</button>
            <p class="info">💡 La búsqueda es parcial, puedes escribir solo una parte del nombre</p>
        </form>
    </div>
    
    <?php if (isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <?php if (!empty($busqueda)): ?>
        <?php if (count($resultados) > 0): ?>
            <h2>Resultados de la búsqueda: "<?php echo htmlspecialchars($busqueda); ?>"</h2>
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
                    <?php foreach ($resultados as $empleado): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($empleado['id']); ?></td>
                            <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                            <td style="text-align: right; font-weight: bold;">
                                <?php echo number_format($empleado['salario'], 2); ?> €
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><strong>Total de resultados:</strong> <?php echo count($resultados); ?></p>
        <?php else: ?>
            <div class="no-resultados">
                <p>No se encontraron empleados con el nombre "<?php echo htmlspecialchars($busqueda); ?>"</p>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
