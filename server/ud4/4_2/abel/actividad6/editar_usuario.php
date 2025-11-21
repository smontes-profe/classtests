<?php
require_once 'config.php';
require_once 'funciones.php';
verificarSesion();
include 'header.php';

$id = $_GET['id'] ?? null;
if (!$id) die("ID no válido.");

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$usuario) die("Usuario no encontrado.");

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre_usuario']);
    $email = trim($_POST['email']);
    $password = $_POST['password'] ?? '';

    try {
        if ($password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET nombre_usuario=:nombre, email=:email, password=:password WHERE id=:id";
            $params = [':nombre'=>$nombre, ':email'=>$email, ':password'=>$hash, ':id'=>$id];
        } else {
            $sql = "UPDATE usuarios SET nombre_usuario=:nombre, email=:email WHERE id=:id";
            $params = [':nombre'=>$nombre, ':email'=>$email, ':id'=>$id];
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $mensaje = "✅ Datos actualizados correctamente.";
    } catch (PDOException $e) {
        $mensaje = "❌ Error: " . $e->getMessage();
    }
}
?>

<h2>Editar usuario</h2>
<form method="post">
    <label>Nombre:</label><br>
    <input type="text" name="nombre_usuario" value="<?= escapar($usuario['nombre_usuario']) ?>" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" value="<?= escapar($usuario['email']) ?>" required><br>
    <label>Nueva contraseña (opcional):</label><br>
    <input type="password" name="password"><br><br>
    <button type="submit">Guardar cambios</button>
</form>

<p><?= $mensaje ?></p>
</body></html>
