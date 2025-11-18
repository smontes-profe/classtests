<?php
require_once 'funciones.php';
usuarioAutenticado();

if (!isset($_GET['id'])) die("Falta ID de usuario");

$id = (int)$_GET['id'];
$mensaje = '';

try {
    $pdo = getPDO();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim($_POST['nombre_usuario']);
        $email = trim($_POST['email']);

        $stmt = $pdo->prepare("UPDATE usuarios SET nombre_usuario = ?, email = ? WHERE id = ?");
        $stmt->execute([$nombre, $email, $id]);
        $mensaje = "Usuario actualizado correctamente.";
    }

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    $usuario = $stmt->fetch();
    if (!$usuario) die("Usuario no encontrado.");
} catch (PDOException $e) {
    die("Error BD: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Editar usuario</title></head>
<body>
<h2>Editar usuario</h2>
<?php if ($mensaje): ?><p style="color:green;"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>

<form method="POST" action="">
    Usuario: <input type="text" name="nombre_usuario" value="<?= htmlspecialchars($usuario['nombre_usuario']) ?>" required><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br>
    <input type="submit" value="Guardar">
</form>
<a href="lista_usuarios.php">Volver</a>
</body>
</html>
