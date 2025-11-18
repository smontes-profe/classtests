<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

require_once 'config.php';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
$usuarios = $pdo->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?></h2>
<a href="logout.php">Cerrar sesión</a>
<table border="1">
<tr><th>Usuario</th><th>Email</th><th>Editar</th><th>Eliminar</th></tr>
<?php foreach ($usuarios as $u): ?>
<tr>
    <td><?= htmlspecialchars($u['nombre_usuario']) ?></td>
    <td><?= htmlspecialchars($u['email']) ?></td>
    <td><a href="editar_usuario.php?id=<?= $u['id'] ?>">Editar</a></td>
    <td><a href="eliminar_usuario.php?id=<?= $u['id'] ?>" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</a></td>
</tr>
<?php endforeach; ?>
</table>