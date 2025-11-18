<?php

// Cargar configuración y arrancar sesión
require_once __DIR__ . '/../1/config.php';
session_start();

// Protección: solo usuarios autenticados
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$errors = [];
$success = '';

// Procesar formulario POST para crear administrador
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validación mínima
    if (empty($nombre) || empty($email) || empty($password)) {
        $errors[] = 'Todos los campos son obligatorios.';
    } else {
        try {
            $pdo = new PDO($dsn, $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Evitar email duplicado
            $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email');
            $stmt->execute([':email' => $email]);
            if ($stmt->fetch()) {
                $errors[] = 'El email ya está registrado.';
            } else {
                // Insertar usuario (hash password)
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare('INSERT INTO usuarios (nombre_usuario, email, password) VALUES (?, ?, ?)');
                $stmt->execute([$nombre, $email, $hash]);
                $success = 'Usuario creado correctamente.';
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
    <title>Crear Nuevo Usuario</title>
</head>
<body>
    <h1>Crear Nuevo Usuario</h1>
    
    <p><a href="usuarios.php">← Volver a la lista</a></p>
    <?php foreach ($errors as $error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endforeach; ?>
    <?php if ($success): ?>
        <p style="color: green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <form method="post">
        <p>
            <label>Nombre de usuario:</label><br>
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
        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>