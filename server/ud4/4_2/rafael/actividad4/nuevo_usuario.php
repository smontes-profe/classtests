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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmar_password = $_POST['confirmar_password'] ?? '';

    // validaciones
    if (empty($nombre_usuario) || empty($email) || empty($password)) {
        $mensaje = "Todos los campos son obligatorios";
        $tipo_mensaje = "error";
    } elseif ($password !== $confirmar_password) {
        $mensaje = "Las contraseñas no coinciden";
        $tipo_mensaje = "error";
    } elseif (strlen($password) < 6) { //por ejemplo
        $mensaje = "La contraseña debe tener al menos 6 caracteres";
        $tipo_mensaje = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El email no es válido";
        $tipo_mensaje = "error";
    } else {
        try {
            $sql_check = "SELECT id FROM usuarios WHERE email = :email";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt_check->execute();

            if ($stmt_check->rowCount() > 0) {
                $mensaje = "El email ya está registrado";
                $tipo_mensaje = "error";
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

                $mensaje = "Usuario registrado correctamente ✅";
                $tipo_mensaje = "exito";

                // Limpiar campos
                $nombre_usuario = '';
                $email = '';
            }
        } catch (PDOException $e) {
            $mensaje = "Error al registrar el usuario: " . $e->getMessage();
            $tipo_mensaje = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!--CSS-->
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
            max-width: 500px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
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
            font-size: 16px;
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
        }
        button:hover {
            background: #5568d3;
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
        .requisitos {
            font-size: 13px;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <!--HTML-->
    <div class="container">
        <h1>Registro de Usuario</h1>
        
        <?php if (!empty($mensaje)): ?>
            <div class="mensaje <?php echo $tipo_mensaje; ?>">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" 
                       id="nombre_usuario" 
                       name="nombre_usuario" 
                       value="<?php echo htmlspecialchars($nombre_usuario ?? ''); ?>"
                       required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="<?php echo htmlspecialchars($email ?? ''); ?>"
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
            
            <button type="submit">Registrar Usuario</button>
        </form>
    </div>
</body>
</html>
