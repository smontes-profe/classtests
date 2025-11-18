<?php
require_once "../actividad1/config.php";

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validación básica
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nombre_usuario === '') {
        $errors[] = "El nombre de usuario es obligatorio.";
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email inválido.";
    }
    if ($password === '' || strlen($password) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    if (empty($errors)) {
        try {
            // Comprobar duplicado
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $errors[] = "El email ya está registrado.";
            } else {
                // Insertar usuario con hash
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $ins = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre_usuario, :email, :password)");
                $ins->bindValue(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $ins->bindValue(':email', $email, PDO::PARAM_STR);
                $ins->bindValue(':password', $hash, PDO::PARAM_STR);
                $ins->execute();

                $success = "Usuario registrado correctamente.";
                // limpiar campos (opcional)
                $nombre_usuario = $email = '';
            }
        } catch (PDOException $e) {
            $errors[] = "Error al registrar: " . $e->getMessage();
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
    <h2>Registro de usuario</h2>

    <?php if ($success): ?>
        <p><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="">
        <label>Nombre de usuario:</label><br>
        <input type="text" name="nombre_usuario" value="<?= htmlspecialchars($nombre_usuario ?? '') ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>"><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password"><br><br>

        <input type="submit" value="Registrar">
    </form>

    <p><a href="login.php">Ir al login</a></p>
</body>

</html>