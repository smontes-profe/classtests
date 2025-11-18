<?php
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }
require_once 'conexion.php';
$pdo = getPDO();

$id = $_GET['id'] ?? null;
if (!$id) { die("ID requerido."); }

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nombre === '') $errors[] = "Nombre obligatorio.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email inválido.";

    if (empty($errors)) {
        try {
            if ($password !== '') {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE usuarios SET nombre_usuario = :nombre, email = :email, password = :password WHERE id = :id";
                $params = [':nombre'=>$nombre, ':email'=>$email, ':password'=>$hash, ':id'=>$id];
            } else {
                $sql = "UPDATE usuarios SET nombre_usuario = :nombre, email = :email WHERE id = :id";
                $params = [':nombre'=>$nombre, ':email'=>$email, ':id'=>$id];
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            $success = "Usuario actualizado.";
        } catch (PDOException $e) {
            $errors[] = "Error: " . htmlspecialchars($e->getMessage());
        }
    }
}

try {
    $stmt = $pdo->prepare("SELECT id, nombre_usuario, email FROM usuarios WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetch();
    if (!$user) die("Usuario no encontrado.");
} catch (PDOException $e) {
    die("Error: " . htmlspecialchars($e->getMessage()));
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Editar usuario</title></head>
<body>
    <h1>Editar usuario</h1>
    <?php if ($success) echo "<p style='color:green'>" . htmlspecialchars($success) . "</p>"; ?>
    <?php if ($errors) { echo "<ul style='color:red'>"; foreach ($errors as $er) echo "<li>" . htmlspecialchars($er) . "</li>"; echo "</ul>"; } ?>

    <form method="post">
        <div><label>Nombre de usuario:<br><input type="text" name="nombre_usuario" value="<?= htmlspecialchars($user['nombre_usuario']) ?>"></label></div>
        <div><label>Email:<br><input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"></label></div>
        <div><label>Nueva contraseña (dejar vacío para no cambiar):<br><input type="password" name="password"></label></div>
        <button type="submit">Guardar</button>
    </form>

    <p><a href="usuarios.php">Volver</a></p>
</body>
</html>