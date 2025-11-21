<?php

// Carga de configuración y sesión
require_once __DIR__ . '/../1/config.php';
session_start();

// Protección: redirige si no hay sesión activa
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Mensajes flash
$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success'], $_SESSION['error']);

// Conectar y obtener lista de usuarios (sin contraseñas)
try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query('SELECT id, nombre_usuario, email FROM usuarios ORDER BY id ASC');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Error en la base de datos: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Usuarios</title>
    <script>
        // Manejo simple de confirmación
        function confirmarEliminar(id, nombre) {
            if (confirm('¿Estás seguro de que quieres eliminar al usuario "' + nombre + '"?')) {
                window.location = 'eliminar_usuario.php?id=' + id;
            }
        }
    </script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="center">
        <h1>Gestor de Usuarios</h1>
        <div class="muted">Conectado como: <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong>
            &nbsp;|&nbsp; <a class="btn btn-ghost" href="salir.php">Cerrar sesión</a>
        </div>
    </header>

    <main>
        <?php if ($success): ?>
            <div class="success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <div style="display:flex;justify-content:space-between;align-items:center;margin:14px 0;">
            <div class="muted">Usuarios registrados: <strong><?= count($users) ?></strong></div>
            <div class="actions">
                <a class="btn btn-primary" href="nuevo_admin.php">👤 Crear nuevo usuario</a>
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="4" class="center muted">No hay usuarios registrados.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['nombre_usuario']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td class="actions">
                                <a class="btn btn-ghost" href="editar_usuario.php?id=<?= $user['id'] ?>">🔧 Editar</a>
                                <?php if ($user['id'] != $_SESSION['user_id']): ?>
                                    <a href="#" class="btn btn-danger" data-id="<?= $user['id'] ?>" data-name="<?= htmlspecialchars($user['nombre_usuario']) ?>"> 🔴 Eliminar</a>
                                <?php else: ?>
                                    <span class="muted">(Sesión actual)</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        document.addEventListener('click', function(e){
            var el = e.target.closest('a[data-id]');
            if(!el) return;
            e.preventDefault();
            var id = el.getAttribute('data-id');
            var name = el.getAttribute('data-name');
            if(confirm('¿Eliminar al usuario "' + name + '" (ID ' + id + ')?')){
                window.location = 'eliminar_usuario.php?id=' + encodeURIComponent(id);
            }
        });
    </script>
</body>
</html>