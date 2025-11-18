<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once 'conexion.php';
$pdo = getPDO();

try {
    $stmt = $pdo->query("SELECT id, nombre_usuario, email FROM usuarios ORDER BY id");
    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error: " . htmlspecialchars($e->getMessage()));
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Gestor de usuarios</title></head>
<body>
    <h1>Gestor de Usuarios Seguros</h1>
    <p>Buenas, <?= htmlspecialchars($_SESSION['user_name']) ?> — <a href="logout.php">Cerrar sesión</a></p>

    <p><a href="nuevo_usuario.php">Crear nuevo usuario</a></p>

    <table border="1" cellpadding="6">
        <thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Editar</th><th>Eliminar</th></tr></thead>
        <tbody>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['id']) ?></td>
                <td><?= htmlspecialchars($u['nombre_usuario']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><a href="editar_usuario.php?id=<?= urlencode($u['id']) ?>">Editar</a></td>
                <td>
                    <form method="post" action="eliminar_usuario.php" onsubmit="return confirm('¿Eliminar usuario?');">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($u['id']) ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>