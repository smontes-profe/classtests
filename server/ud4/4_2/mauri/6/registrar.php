<?php

// Config y manejo de formulario de registro
require_once __DIR__ . '/../1/config.php';

$errors = [];
$success = '';

// Procesar POST de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Limpiar entrada del formulario
    $nombre = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validación básica
    if (empty($nombre) || empty($email) || empty($password)) {
        $errors[] = 'Todos los campos son obligatorios.';
    } else {
        try {
            $pdo = new PDO($dsn, $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Comprobar email existente
            $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = ?');
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $errors[] = 'El email ya está registrado.';
            } else {
                // Insertar nuevo usuario (hash de la contraseña)
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare('INSERT INTO usuarios (nombre_usuario, email, password) VALUES (?, ?, ?)');
                $stmt->execute([$nombre, $email, $hash]);
                $success = 'Usuario registrado correctamente. <a href="login.php">Iniciar sesión</a>';
            }
        } catch (PDOException $e) {
            $errors[] = 'Error: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <?php foreach ($errors as $error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endforeach; ?>
    <?php if ($success): ?>
        <p style="color: green;"><?= $success ?></p>
    <?php endif; ?>
    <form method="post">
        <p>
            <label>Nombre:</label><br>
            <input type="text" name="nombre_usuario" required>
        </p>       
        <p>
            <label>Email:</label><br>
            <input type="email" name="email" required>
        </p>      
        <p>
            <label>Contraseña:</label><br>
            <input type="password" name="password" required>
        </p>       
        <button type="submit">Registrar</button>
    </form>
    <p><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>
</body>
</html>