<?php
session_start();
require_once '../actividad1/config.php'; // Aquí ya se crea $pdo automáticamente y se establece conexión

// Si ya está autenticado, redirigir al panel
if (isset($_SESSION['usuario_id'])) {
    header('Location: panel.php');
    exit;
}

$error = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = "Email y contraseña son obligatorios";
    } else {
        try {
            // Buscar usuario por email
            $sql = "SELECT id, nombre_usuario, email, password FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            $usuario = $stmt->fetch();
            
            // Verificar si existe el usuario y la contraseña es correcta
            if ($usuario && password_verify($password, $usuario['password'])) {
                // Regenerar ID de sesión para prevenir sesión fija
                session_regenerate_id(true);
                
                // Guardar datos en sesión
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
                $_SESSION['email'] = $usuario['email'];
                
                // Redirigir al panel
                header('Location: panel.php');
                exit;
            } else {
                $error = "Email o contraseña incorrectos";
            }
            
        } catch (PDOException $e) {
            $error = "Error en el sistema: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestor de Usuarios</title>
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
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
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
        .registro-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        .registro-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }
        .registro-link a:hover {
            text-decoration: underline;
        }
        .volver {
            text-align: center;
            margin-top: 15px;
        }
        .volver a {
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
        }
        .volver a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Iniciar Sesión</h1>
        <p class="subtitle">Accede a tu cuenta</p>
        
        <?php if (!empty($error)): ?>
            <div class="error">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="<?php echo htmlspecialchars($email); ?>"
                       required 
                       autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       required>
            </div>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
        
        <div class="registro-link">
            ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
        </div>
        
        <div class="volver">
            <a href="index.php">← Volver al inicio</a>
        </div>
    </div>
</body>
</html>