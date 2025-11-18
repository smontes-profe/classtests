<?php
// Definimos el título
$titulo_pagina = 'Dashboard - Lista de Usuarios';

// ¡IMPORTANTE! Le decimos al header que esta página es privada
// El header.php se encargará de comprobar la sesión
$pagina_privada = true;

// Incluimos el header (que ya tiene session_start() y config.php)
require_once 'includes/header.php';

// Preparamos el array para guardar los usuarios
$usuarios = [];
try {
    // Conectamos a la BBDD
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparamos la consulta para coger todos los usuarios
    $sql = "SELECT id, nombre_usuario, email FROM usuarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Guardamos todos los usuarios en el array
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Error al listar usuarios: " . $e->getMessage();
}
?>
<h2>Gestor de Usuarios Seguros</h2>
<p>
    ¡Bienvenido, <strong><?= htmlspecialchars($_SESSION['usuario_nombre']) ?></strong>!
</p>
<p>
    Esta es una página privada. Solo puedes verla si has iniciado sesión.
    Aquí está la lista de usuarios registrados en el sistema.
</p>

<?php // --- Lógica para mostrar la tabla o errores --- 
?>

<?php if ($error): ?>
    <p class="error"><?= $error ?></p>
<?php elseif (count($usuarios) > 0): ?>
    <table class="tabla-usuarios">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['id']) ?></td>
                    <td><?= htmlspecialchars($usuario['nombre_usuario']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td>
                        <a href="editar_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-editar">Editar</a>
                        <?php  ?>
                        <?php if ($usuario['id'] != $_SESSION['usuario_id']): ?>
                            <a href="eliminar_usuario.php?id=<?= $usuario['id'] ?>"
                                class="btn btn-eliminar"
                                onclick="return confirm('¿Estás seguro? Esta acción es irreversible.');">
                                Eliminar
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No hay usuarios registrados.</p>
<?php endif; ?>
<?php
require_once 'includes/footer.php';
?>