<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

require_once 'config.php';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);

$id = $_GET['id'];
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_usuario'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE usuarios SET nombre_usuario = :nombre, email = :email WHERE id = :id");
    $stmt->execute([':nombre' => $nombre, ':email' => $email, ':id' => $id]);
    $mensaje = "Usuario actualizado.";
}

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $id]);
$usuario = $stmt->fetch();
?>

<h2>Editar Usuario</h2>
<form method="POST">
    <label>Usuario:</label><input type="text" name="nombre_usuario" value="<?= htmlspecialchars($usuario['nombre_usuario']) ?>"><br>
    <label>Email:</label><input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>"><br>
    <button type="submit">Actualizar</button>
</form>
<p><?= $mensaje ?></p>