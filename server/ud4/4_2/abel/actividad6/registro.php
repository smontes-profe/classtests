<?php
require_once 'config.php';
require_once 'funciones.php';
include 'header.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nombre && $email && $password) {
        $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $check->execute([':email' => $email]);

        if ($check->rowCount() > 0) {
            $mensaje = "❌ Ese correo ya está registrado.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre, :email, :password)");
            $stmt->execute([':nombre' => $nombre, ':email' => $email, ':password' => $hash]);
            $mensaje = "✅ Usuario registrado correctamente. <a href='login.php'>Iniciar sesión</a>";
        }
    } else {
        $mensaje = "⚠️ Todos los campos son obligatorios.";
    }
}
?>

<h2>Registro de usuario</h2>
<form method="post">
    <label>Nombre de usuario:</label><br>
    <input type="text" name="nombre_usuario" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Registrar</button>
</form>
<p><?= $mensaje ?></p>
</body></html>
