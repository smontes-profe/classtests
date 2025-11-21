<?php

require_once 'config.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_usuario'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Comprobar si ya existe el email
        $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $check->execute([':email' => $email]);

        if ($check->rowCount() > 0) {
            $mensaje = "❌ El correo ya está registrado.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre, :email, :password)");
            $stmt->execute([':nombre' => $nombre, ':email' => $email, ':password' => $hash]);
            $mensaje = "✅ Usuario registrado correctamente.";
        }
    } catch (PDOException $e) {
        $mensaje = "Error: " . $e->getMessage();
    }
}

?>

<form method="post">
    <label>Nombre de usuario:</label>
    <input type="text" name="nombre_usuario" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Contraseña:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Registrar</button>
</form>

<p><?= $mensaje ?></p>
