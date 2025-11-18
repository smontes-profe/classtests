<?php
// 1. ¡SIEMPRE PRIMERO!
session_start();

// Si el usuario ya está logueado, redirigir a la lista
if (isset($_SESSION['user_id'])) {
    header("Location: lista_usuarios.php");
    exit;
}

require_once 'conexion.php';
$mensaje = "";

// 2. Comprobar envío POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if (empty($email) || empty($password)) {
        $mensaje = "Email y contraseña son obligatorios.";
    } else {
        try {
            // 3. Buscar al usuario por email
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // 4. 🔒 Verificación de contraseña
            // Comprobamos si se encontró un usuario Y si la contraseña coincide con el hash
            if ($usuario && password_verify($password, $usuario['password'])) {
                
                // 5. ¡Contraseña correcta! Iniciar sesión
                // Guardamos los datos del usuario en la sesión
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_name'] = $usuario['nombre_usuario'];
                
                // 6. Redirigir a la página protegida
                header("Location: lista_usuarios.php");
                exit;
                
            } else {
                // Usuario no encontrado o contraseña incorrecta
                $mensaje = "Email o contraseña incorrectos.";
            }

        } catch (PDOException $e) {
            $mensaje = "Error de base de datos: " . $e->getMessage();
        }
    }
}
$pdo = null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; display: grid; place-items: center; min-height: 90vh; }
        .container { border: 1px solid #ccc; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 300px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .mensaje.error { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; }
        .link-registro { text-align: center; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Inicio de Sesión</h2>

        <?php if ($mensaje): ?>
            <p class="mensaje error"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
        
        <div class="link-registro">
            <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
        </div>
    </div>
</body>
</html>