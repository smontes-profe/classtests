<?php
require_once 'funciones.php';
usuarioAutenticado();

try {
    $pdo = getPDO();
    $usuarios = $pdo->query("SELECT id, nombre_usuario, email FROM usuarios")->fetchAll();
} catch (PDOException $e) {
    die("Error BD: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Lista de usuarios</title></head>
<body>
<h2>Bienvenido, <?= htmlspecialchars($_SESSION['nombre_usuario']) ?></h2>
<a href="logout.php">Cerrar sesión</a>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Usuario</th>
    <th>Email</th>
    <th>Editar</th>
    <th>Eliminar</th>
</tr>
<?php foreach ($usuarios as $u): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= htmlspecialchars($u['nombre_usuario']) ?></td>
    <td><?= htmlspecialchars($u['email']) ?></td>
    <td><a href="editar_usuario.php?id=<?= $u['id'] ?>">Editar</a></td>
    <td><a href="eliminar_usuario.php?id=<?= $u['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar</a></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
