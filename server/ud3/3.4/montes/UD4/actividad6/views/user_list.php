<?php
/**
 * Vista para mostrar el listado de usuarios.
 *
 * Esta vista es "tonta", solo muestra los datos que le
 * pasa el controlador 'dashboard.php'.
 */
?>

<h2>Dashboard - Listado de Usuarios</h2>
<p>
    ¡Bienvenido, 
    <strong><?= htmlspecialchars($_SESSION['user_nombre'] ?? 'Usuario') ?>!</strong>
</p>

<?php
// Mostrar error si existió un problema con la BBDD
if (!empty($error_db)): ?>
    <div class="errors" style="color: red; border: 1px solid red; padding: 10px;">
        <?= $error_db ?>
    </div>
<?php endif; ?>

<h3>Usuarios Registrados</h3>
<table border="1" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="padding: 8px;">ID</th>
            <th style="padding: 8px;">Nombre</th>
            <th style="padding: 8px;">Email</th>
            <th style="padding: 8px;">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($usuarios)): ?>
            <tr>
                <td colspan="4" style="text-align: center; padding: 8px;">
                    No hay usuarios registrados.
                </td>
            </tr>
        <?php else: ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td style="padding: 8px;"><?= $usuario['id'] ?></td>
                    <td style="padding: 8px;"><?= htmlspecialchars($usuario['nombre']) ?></td>
                    <td style="padding: 8px;"><?= htmlspecialchars($usuario['email']) ?></td>
                    <td style="padding: 8px; text-align: center;">
                        <a href="edit_user.php?id=<?= $usuario['id'] ?>">Editar</a>
                        |
                        <a href="delete_user.php?id=<?= $usuario['id'] ?>" 
                           onclick="return confirm('¿Estás seguro de que deseas eliminar a este usuario?');">
                           Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>