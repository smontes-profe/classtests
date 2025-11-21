<?php
// Cargar configuración (DSN y credenciales)
require_once __DIR__ . '/../1/config.php';

$errors = [];
$success = '';

// Procesar formulario POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar entrada
    $nombre = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validación mínima
    if ($nombre === '' || $email === '' || $password === '') {
        $errors[] = 'Todos los campos son obligatorios.';
    }

    // Si no hay errores, intentar insertar usuario
    if (empty($errors)) {
        try {
            $pdo = new PDO($dsn, $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Comprobar si el email ya está registrado
            $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email');
            $stmt->execute([':email' => $email]);
            if ($stmt->fetch()) {
                $errors[] = 'El email ya está registrado.';
            } else {
                // Hashear password e insertar
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $insert = $pdo->prepare('INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre, :email, :pass)');
                $insert->bindValue(':nombre', $nombre);
                $insert->bindValue(':email', $email);
                $insert->bindValue(':pass', $hash);
                $insert->execute();
                $success = 'Usuario registrado correctamente.';
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
    <title>Nuevo usuario</title>
    </head>
    <body>
        <h1>Registrar nuevo usuario</h1>

        <?php foreach ($errors as $err): ?>
        <p style="color:red"><?= htmlspecialchars($err) ?></p>
        <?php endforeach; ?>

        <?php if ($success): ?>
        <p style="color:green"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form method="post">
            <label>Nombre de usuario: <input type="text" name="nombre_usuario"></label><br>
            <label>Email: <input type="email" name="email"></label><br>
            <label>Password: <input type="password" name="password"></label><br>
            <button type="submit">Crear</button>
        </form>
    </body>
</html>