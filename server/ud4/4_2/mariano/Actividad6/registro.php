<?php
require_once 'funciones.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = trim($_POST['nombre_usuario']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($nombre_usuario === '' || $email === '' || $password === '' || $password2 === '') {
        $mensaje = 'Todos los campos son obligatorios.';
    } elseif ($password !== $password2) {
        $mensaje = 'Las contraseñas no coinciden.';
    } else {
        try {
            $pdo = getPDO();
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);

            if ($stmt->fetch()) {
                $mensaje = 'El correo ya está registrado.';
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$nombre_usuario, $email, $hash]);
                header("Location: login.php?registro=ok");
                exit;
            }
        } catch (PDOException $e) {
            $mensaje = 'Error BD: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro de usuario</title>
</head>
<body>
<h2>Registro</h2>
<?php if ($mensaje): ?><p style="color:red;"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<form method="POST" action="">
    Usuario: <input type="text" name="nombre_usuario" value="<?= htmlspecialchars($_POST['nombre_usuario'] ?? '') ?>" required><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required><br>
    Contraseña: <input type="password" name="password" required><br>
    Repite contraseña: <input type="password" name="password2" required><br>
    <input type="submit" value="Registrarme">
</form>
<p><a href="login.php">Ir a Login</a></p>
</body>
</html>
