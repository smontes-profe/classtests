<?php
require_once 'config.php';
require_once 'funciones.php';
verificarSesion();
include 'header.php';

$stmt = $pdo->query("SELECT id, nombre_usuario, email FROM usuarios ORDER BY id ASC");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Lista de usuarios</h2>

<table>
<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr>
<?php foreach ($usuarios as $u): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= escapar($u['nombre_usuario']) ?></td>
    <td><?= escapar($u['email']) ?></td>
    <td>
        <a href="editar_usuario.php?id=<?= $u['id'] ?>">Editar</a> |
        <a href="eliminar_usuario.php?id=<?= $u['id'] ?>" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

</body></html>
