<?php
session_start();
require_once '../actividad1/config.php';// Aquí ya se crea $pdo automáticamente y se establece conexión

// Verificar autenticación
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

$mensaje = '';
$tipo_mensaje = '';

// Procesar eliminación de usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id'])) {
    $id_eliminar = (int)$_POST['eliminar_id'];
    
    // No permitir que el usuario se elimine a sí mismo
    if ($id_eliminar === $_SESSION['usuario_id']) {
        $mensaje = "No puedes eliminar tu propia cuenta mientras estás logueado";
        $tipo_mensaje = "error";
    } else {
        try {
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id_eliminar, PDO::PARAM_INT);
            $stmt->execute();
            
            $mensaje = "Usuario eliminado correctamente";
            $tipo_mensaje = "exito";
            
        } catch (PDOException $e) {
            $mensaje = "Error al eliminar: " . $e->getMessage();
            $tipo_mensaje = "error";
        }
    }
}

// Obtener lista de usuarios
try {
    $sql = "SELECT id, nombre_usuario, email FROM usuarios ORDER BY nombre_usuario";
    $stmt = $pdo->query($sql);
    $usuarios = $stmt->fetchAll();
    
} catch (PDOException $e) {
    die("Error al cargar usuarios: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - Gestor de Usuarios</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
        }
        .navbar {
            background-color: #99b8e8ff;
            color: white;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .navbar-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .user-info {
            font-size: 16px;
        }
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
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
        .tabla-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #667eea;
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
        .badge-tu {
            background: #28a745;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            margin-left: 5px;
        }
        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
    <script>
        function confirmarEliminacion(nombre) {
            return confirm('¿Estás seguro de que quieres eliminar al usuario "' + nombre + '"?\n\nEsta acción no se puede deshacer.');
        }
    </script>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-content">
            <div class="user-info">
                Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></strong>
            </div>
            <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
        </div>
    </nav>
    
    <div class="container">
        <h1>Gestión de Usuarios</h1>
        
        <?php if (!empty($mensaje)): ?>
            <div class="mensaje <?php echo $tipo_mensaje; ?>">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>
        
        <div class="tabla-container">
            <?php if (count($usuarios) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                                <td>
                                    <?php echo htmlspecialchars($usuario['nombre_usuario']); ?>
                                    <?php if ($usuario['id'] === $_SESSION['usuario_id']): ?>
                                        <span class="badge-tu">TÚ</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                                <td>
                                    <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>" 
                                       class="btn btn-editar">
                                        Editar
                                    </a>
                                    
                                    <?php if ($usuario['id'] !== $_SESSION['usuario_id']): ?>
                                        <form method="POST" 
                                              style="display: inline;" 
                                              onsubmit="return confirmarEliminacion('<?php echo htmlspecialchars($usuario['nombre_usuario']); ?>')">
                                            <input type="hidden" name="eliminar_id" value="<?php echo $usuario['id']; ?>">
                                            <button type="submit" class="btn btn-eliminar">
                                                Eliminar
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p style="margin-top: 20px; text-align: center; color: #666;">
                    <strong>Total de usuarios:</strong> <?php echo count($usuarios); ?>
                </p>
            <?php else: ?>
                <div class="no-data">
                    <p>No hay usuarios registrados</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>