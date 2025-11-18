<?php
require_once "../actividad1/config.php";
session_start();

// Proteger la página: solo usuarios autenticados
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT id, nombre_usuario, email FROM usuarios ORDER BY id");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Usuarios</title></head>
<body>
<h2>Gestor de Usuarios Seguros</h2>
<p>Usuario: <?= htmlspecialchars($_SESSION['user_name']) ?> | <a href="logout.php">Salir</a></p>

<p><a href="register.php">Crear nuevo usuario</a></p>

<?php if (count($usuarios) === 0): ?>
    <p>No hay usuarios registrados.</p>
<?php else: ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre usuario</th>
            <th>Email</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['id']) ?></td>
                <td><?= htmlspecialchars($u['nombre_usuario']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><a href="editarUsuario.php?id=<?= $u['id'] ?>">Editar</a></td>
                <td>
                    <!-- Formulario POST para eliminar (mejor que GET) -->
                    <form method="post" action="eliminarUsuario.php" style="display:inline" onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?');">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($u['id']) ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</body>
</html>
