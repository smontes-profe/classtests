<?php
session_start();
require_once '../actividad1/config.php'; // Aquí ya se crea $pdo automáticamente y se establece conexión

// Verificar autenticación
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

// Verificar que se recibió un ID
if (!isset($_GET['id']) && !isset($_POST['id'])) {
    header('Location: panel.php');
    exit;
}

$id = isset($_POST['id']) ? (int)$_POST['id'] : (int)$_GET['id'];
$errores = [];
$exito = '';
$usuario = null;

try {
    // Procesar actualización
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $nueva_password = $_POST['nueva_password'] ?? '';
        $confirmar_password = $_POST['confirmar_password'] ?? '';
        
        // Validación
        if (empty($nombre_usuario)) {
            $errores[] = "El nombre de usuario es obligatorio";
        } elseif (strlen($nombre_usuario) < 3) {
            $errores[] = "El nombre debe tener al menos 3 caracteres";
        }
        
        if (empty($email)) {
            $errores[] = "El email es obligatorio";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El email no es válido";
        }
        
        // Validar contraseña solo si se proporcionó una nueva
        if (!empty($nueva_password)) {
            if (strlen($nueva_password) < 6) {
                $errores[] = "La contraseña debe tener al menos 6 caracteres";
            } elseif ($nueva_password !== $confirmar_password) {
                $errores[] = "Las contraseñas no coinciden";
            }
        }
        
        // Si no hay errores, actualizar
        if (empty($errores)) {
            // Verificar si el email ya existe (excepto el actual)
            $sql_check = "SELECT id FROM usuarios WHERE email = :email AND id != :id";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt_check->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt_check->execute();
            
            if ($stmt_check->rowCount() > 0) {
                $errores[] = "El email ya está en uso por otro usuario";
            } else {
                // Preparar consulta de actualización
                if (!empty($nueva_password)) {
                    // Actualizar con nueva contraseña
                    $password_hash = password_hash($nueva_password, PASSWORD_DEFAULT);
                    $sql_update = "UPDATE usuarios 
                                  SET nombre_usuario = :nombre_usuario, email = :email, 
                                      password = :password 
                                  WHERE id = :id";
                    $stmt_update = $pdo->prepare($sql_update);
                    $stmt_update->bindValue(':password', $password_hash, PDO::PARAM_STR);
                } else {
                    // Actualizar sin cambiar contraseña
                    $sql_update = "UPDATE usuarios 
                                  SET nombre_usuario = :nombre_usuario, 
                                      email = :email 
                                  WHERE id = :id";
                    $stmt_update = $pdo->prepare($sql_update);
                }
                
                $stmt_update->bindValue(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $stmt_update->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt_update->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt_update->execute();
                
                // Si el usuario editó su propia cuenta, actualizar sesión
                if ($id === $_SESSION['usuario_id']) {
                    $_SESSION['nombre_usuario'] = $nombre_usuario;
                    $_SESSION['email'] = $email;
                }
                
                $exito = "Usuario actualizado correctamente";
            }
        }
    }
    
    // Obtener datos actuales del usuario
    $sql_select = "SELECT id, nombre_usuario, email FROM usuarios WHERE id = :id";
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt_select->execute();
    
    $usuario = $stmt_select->fetch();
    
    if (!$usuario) {
        header('Location: panel.php');
        exit;
    }
    
} catch (PDOException $e) {
    $errores[] = "Error en el sistema: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - Gestor de Usuarios</title>
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
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .errores {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        .errores ul {
            margin-left: 20px;
        }
        .exito {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            text-align: center;
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
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        input:focus {
            outline: none;
            border-color: #667eea;
        }
        .requisitos {
            font-size: 12px;
            color: #666;
            margin-top: 3px;
        }
        .info-box {
            background: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 3px;
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
    <nav class="navbar">
        <div class="navbar-content">
            <strong><?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></strong>
        </div>
    </nav>
    
    <div class="container">
        <h1>Editar Usuario</h1>
        
        <?php if (!empty($errores)): ?>
            <div class="errores">
                <strong>Errores:</strong>
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($exito)): ?>
            <div class="exito">
                <?php echo htmlspecialchars($exito); ?>
            </div>
        <?php endif; ?>
        
        <div class="info-box">
            Deja el campo de contraseña vacío si no deseas cambiarla
        </div>
        
        <form method="POST" action="" novalidate>
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
            
            <div class="form-group">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" 
                       id="nombre_usuario" 
                       name="nombre_usuario" 
                       value="<?php echo htmlspecialchars($usuario['nombre_usuario']); ?>"
                       required>
                <p class="requisitos">Mínimo 3 caracteres</p>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="<?php echo htmlspecialchars($usuario['email']); ?>"
                       required>
            </div>
            
            <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">
            
            <div class="form-group">
                <label for="nueva_password">Nueva Contraseña (opcional):</label>
                <input type="password" 
                       id="nueva_password" 
                       name="nueva_password">
                <p class="requisitos">Mínimo 6 caracteres, o déjalo vacío</p>
            </div>
            
            <div class="form-group">
                <label for="confirmar_password">Confirmar Nueva Contraseña:</label>
                <input type="password" 
                       id="confirmar_password" 
                       name="confirmar_password">
            </div>
            
            <div class="btn-group">
                <button type="submit">Guardar Cambios</button>
                <a href="panel.php" class="btn btn-volver">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>