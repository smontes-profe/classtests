<?php
session_start();
require_once 'config.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre_usuario']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $check->execute([':email' => $email]);

        if ($check->rowCount() > 0) {
            $mensaje = " El email ya está registrado.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre, :email, :password)");
            $stmt->execute([':nombre' => $nombre, ':email' => $email, ':password' => $password]);
            $mensaje = " Usuario registrado correctamente.";
        }
    } catch (PDOException $e) {
        $mensaje = " Error: " . $e->getMessage();
    }
}
?>

<h2>Registro de Usuario</h2>
<form method="POST">
    <label>Usuario:</label><input type="text" name="nombre_usuario" required><br>
    <label>Email:</label><input type="email" name="email" required><br>
    <label>Contraseña:</label><input type="password" name="password" required><br>
    <button type="submit">Registrar</button>
</form>
<p><?= $mensaje ?></p>