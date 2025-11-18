<?php
session_start();
require_once '../actividad1/config.php'; // Aquí ya se crea $pdo automáticamente y se establece conexión

// Si ya está autenticado, redirigir al panel
if (isset($_SESSION['usuario_id'])) {
    header('Location: panel.php');
    exit;
}

$errores = [];
$exito = '';
$nombre_usuario = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y sanitizar datos
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmar = $_POST['confirmar_password'] ?? '';
    
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
    
    if (empty($password)) {
        $errores[] = "La contraseña es obligatoria";
    } elseif (strlen($password) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres";
    }
    
    if ($password !== $confirmar) {
        $errores[] = "Las contraseñas no coinciden";
    }
    
    // Si no hay errores, procesar el registro
    if (empty($errores)) {
        try {
            // Verificar si el email ya existe
            $sql_check = "SELECT id FROM usuarios WHERE email = :email";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt_check->execute();
            
            if ($stmt_check->rowCount() > 0) {
                $errores[] = "El email ya está registrado";
            } else {
                // Cifrar contraseña
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                
                // Insertar usuario
                $sql_insert = "INSERT INTO usuarios (nombre_usuario, email, password) 
                              VALUES (:nombre_usuario, :email, :password)";
                $stmt_insert = $pdo->prepare($sql_insert);
                $stmt_insert->bindValue(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $stmt_insert->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt_insert->bindValue(':password', $password_hash, PDO::PARAM_STR);
                $stmt_insert->execute();
                
                $exito = "Usuario registrado correctamente. Redirigiendo al login...";
                
                // Limpiar formulario
                $nombre_usuario = '';
                $email = '';
                
                // Redirigir tras 2 segundos
                header("refresh:2;url=login.php");
            }
            
        } catch (PDOException $e) {
            $errores[] = "Error en el sistema: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Gestor de Usuarios</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #99b8e8ff;
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
            max-width: 450px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 25px;
            font-size: 14px;
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
        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #5568d3;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro</h1>
        <p class="subtitle">Crea tu cuenta en el sistema</p>
        
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
        
        <form method="POST" action="" novalidate>
            <div class="form-group">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" 
                       id="nombre_usuario" 
                       name="nombre_usuario" 
                       value="<?php echo htmlspecialchars($nombre_usuario); ?>"
                       required>
                <p class="requisitos">Mínimo 3 caracteres</p>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="<?php echo htmlspecialchars($email); ?>"
                       required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       required>
                <p class="requisitos">Mínimo 6 caracteres</p>
            </div>
            
            <div class="form-group">
                <label for="confirmar_password">Confirmar Contraseña:</label>
                <input type="password" 
                       id="confirmar_password" 
                       name="confirmar_password" 
                       required>
            </div>
            
            <button type="submit">Registrarse</button>
        </form>
        
        <div class="login-link">
            ¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>
        </div>
    </div>
</body>
</html>