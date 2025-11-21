<?php
require_once '../actividad1/config.php'; // Aquí ya se crea $pdo automáticamente y se establece conexión

$mensaje = '';
$tipo_mensaje = '';

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

// Procesar eliminación si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id'])) {
    $id_eliminar = (int)$_POST['eliminar_id'];

    try {
        // Consulta preparada para eliminar
        $sql = "DELETE FROM empleados WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id_eliminar, PDO::PARAM_INT);
        $stmt->execute();

        $mensaje = "Empleado eliminado correctamente";
        $tipo_mensaje = "exito";
    } catch (PDOException $e) {
        $mensaje = "Error al eliminar: " . $e->getMessage();
        $tipo_mensaje = "error";
    }
}

// Obtener lista de empleados
try {
    $sql = "SELECT id, nombre, puesto, salario FROM empleados ORDER BY nombre";
    $stmt = $pdo->query($sql);
    $empleados = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error al cargar empleados: " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
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
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:hover {
            background: #f5f5f5;
        }
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            transition: all 0.3s;
        }
        .btn-editar {
            background: #2196F3;
            color: white;
        }
        .btn-editar:hover {
            background: #0b7dda;
        }
        .btn-eliminar {
            background: #f44336;
            color: white;
        }
        .btn-eliminar:hover {
            background: #da190b;
        }
        .acciones {
            white-space: nowrap;
        }
        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
    <script>
        // Función para confirmar eliminación
        function confirmarEliminacion(nombre) {
            return confirm('¿Estás seguro de que quieres eliminar al empleado "' + nombre + '"?\n\nEsta acción no se puede deshacer.');
        }
    </script>
</head>
<body>
    <h1>Gestión de Empleados</h1>
    
    <?php if (!empty($mensaje)): ?>
        <div class="mensaje <?php echo $tipo_mensaje; ?>">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>
    
    <?php if (count($empleados) > 0): ?>
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
                        <td><?php echo htmlspecialchars($empleado['id']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                        <td style="text-align: right;">
                            <?php echo number_format($empleado['salario'], 2); ?> €
                        </td>
                        <td class="acciones">
                            <!-- Botón Editar: redirige a empleado.php con el ID -->
                            <a href="empleado.php?id=<?php echo $empleado['id']; ?>" 
                               class="btn btn-editar">
                                Editar
                            </a>
                            
                            <!-- Formulario para Eliminar con confirmación JavaScript -->
                            <form method="POST" 
                                  style="display: inline;" 
                                  onsubmit="return confirmarEliminacion('<?php echo htmlspecialchars($empleado['nombre']); ?>')">
                                <input type="hidden" 
                                       name="eliminar_id" 
                                       value="<?php echo $empleado['id']; ?>">
                                <button type="submit" class="btn btn-eliminar">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p style="margin-top: 20px; text-align: center;">
            <strong>Total de empleados:</strong> <?php echo count($empleados); ?>
        </p>
    <?php else: ?>
        <div class="no-data">
            <p>No hay empleados registrados</p>
        </div>
    <?php endif; ?>
</body>
</html>