<?php
require_once 'config.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre_usuario']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar duplicado
        $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $check->bindValue(':email', $email);
        $check->execute();

        if ($check->rowCount() > 0) {
            $mensaje = "El email ya está registrado.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre, :email, :password)");
            $stmt->bindValue(':nombre', $nombre);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            $mensaje = "Usuario registrado correctamente.";
        }
    } catch (PDOException $e) {
        $mensaje = "Error: " . $e->getMessage();
    }
}
?>

<form method="POST">
    <label>Usuario:</label><input type="text" name="nombre_usuario" required><br>
    <label>Email:</label><input type="email" name="email" required><br>
    <label>Contraseña:</label><input type="password" name="password" required><br>
    <button type="submit">Registrar</button>
</form>
<p><?= $mensaje ?></p>