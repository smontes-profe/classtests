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

$mensaje = '';
$tipo_mensaje = '';
$empleado = null;

// Verificar que se recibió un ID
if (!isset($_GET['id']) && !isset($_POST['id'])) {
    header('Location: lista.php');
    exit;
}

$id = isset($_POST['id']) ? (int)$_POST['id'] : (int)$_GET['id'];

try {
    // Procesar actualización si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim($_POST['nombre'] ?? '');
        $puesto = trim($_POST['puesto'] ?? '');
        $salario = trim($_POST['salario'] ?? '');
        
        // Validación básica
        if (empty($nombre) || empty($puesto) || empty($salario)) {
            $mensaje = "Todos los campos son obligatorios";
            $tipo_mensaje = "error";
        } elseif (!is_numeric($salario) || $salario < 0) {
            $mensaje = "El salario debe ser un número válido";
            $tipo_mensaje = "error";
        } else {
            // Actualizar empleado con consulta preparada
            $sql_update = "UPDATE empleados 
                          SET nombre = :nombre, puesto = :puesto, salario = :salario 
                          WHERE id = :id";
            $stmt_update = $pdo->prepare($sql_update);
            
            $stmt_update->bindValue(':nombre', $nombre, PDO::PARAM_STR);
            $stmt_update->bindValue(':puesto', $puesto, PDO::PARAM_STR);
            $stmt_update->bindValue(':salario', $salario, PDO::PARAM_STR);
            $stmt_update->bindValue(':id', $id, PDO::PARAM_INT);
            
            $stmt_update->execute();
            
            $mensaje = "Empleado actualizado correctamente";
            $tipo_mensaje = "exito";
        }
    }
    
    // Obtener datos del empleado
    $sql_select = "SELECT id, nombre, puesto, salario FROM empleados WHERE id = :id";
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt_select->execute();
    
    $empleado = $stmt_select->fetch();
    
    // Si no existe el empleado, redirigir
    if (!$empleado) {
        header('Location: lista.php');
        exit;
    }
    
} catch (PDOException $e) {
    $mensaje = "Error: " . $e->getMessage();
    $tipo_mensaje = "error";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <!-- CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #99b8e8ff ;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .mensaje {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .exito {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        input:focus {
            outline: none;
            border-color: #667eea;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        button, .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        button[type="submit"] {
            background: #4CAF50;
            color: white;
        }
        button[type="submit"]:hover {
            background: #45a049;
        }
        .btn-volver {
            background: #6c757d;
            color: white;
        }
        .btn-volver:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
    <!--HTML-->
    <div class="container">
        <h1>Editar Empleado</h1>
        
        <?php if (!empty($mensaje)): ?>
            <div class="mensaje <?php echo $tipo_mensaje; ?>">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <!-- Ocultar ID -->
            <input type="hidden" name="id" value="<?php echo $empleado['id']; ?>">
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" 
                       id="nombre" 
                       name="nombre" 
                       value="<?php echo htmlspecialchars($empleado['nombre']); ?>" 
                       required>
            </div>
            
            <div class="form-group">
                <label for="puesto">Puesto:</label>
                <input type="text" 
                       id="puesto" 
                       name="puesto" 
                       value="<?php echo htmlspecialchars($empleado['puesto']); ?>" 
                       required>
            </div>
            
            <div class="form-group">
                <label for="salario">Salario (€):</label>
                <input type="number" 
                       id="salario" 
                       name="salario" 
                       step="0.01" 
                       min="0"
                       value="<?php echo htmlspecialchars($empleado['salario']); ?>" 
                       required>
            </div>
            
            <div class="btn-group">
                <button type="submit">Guardar Cambios</button>
                <a href="lista.php" class="btn btn-volver">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>