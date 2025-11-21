<?php
session_start();
require_once __DIR__ . '/../actividad1/conexion.php';


if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}
$st = $pdo->query("SELECT id, nombre_usuario, email FROM usuarios");
$usuarios = $st->fetchAll();
?>
<h2>Listado usuarios</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nombre usuario</th>
    <th>Email</th>
    <th>acciones</th>
</tr>

<?php foreach($usuarios as $u): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= htmlspecialchars($u['nombre_usuario']) ?></td>
    <td><?= htmlspecialchars($u['email']) ?></td>
    <td>
        <a href="editar_usuario.php?id=<?= $u['id'] ?>">editar</a>
        |
        <a href="eliminar_usuario.php?id=<?= $u['id'] ?>"
           onclick="return confirm('¿borrar usuario?')">borrar</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<a href="usuario.php"><button>Volver</button></a>
