<?php

//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';
session_start();

//Solo los usuarios autentificados pueden ver esta pagina
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

//Muestro los mensajes de exito o error que vienen de otra pagina. Los mensajes se guardan en la sesion y se muestran aqui una sola vez
$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
//Los borro de la sesion para que no se vuelvaan a mostrar otra vez al recargar
unset($_SESSION['success'], $_SESSION['error']);

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Obtengo la lista de usuarios sin contraseña(para mas seguridad)
    //Utilizo ORDER BY id ASC para que aparezca en orden de creacion
    $stmt = $pdo->query('SELECT id, nombre_usuario, email FROM usuarios ORDER BY id ASC');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Muestro error si hay algun error con la base de datos
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
        //Confirmacion antes de eliminar
        function confirmarEliminar(id, nombre) {
            if (confirm('¿Estás seguro de que quieres eliminar al usuario "' + nombre + '"?')) {
                //Si se confirma se reedirige a la pagina de eliminar
                window.location = 'delete_user.php?id=' + id;
            }
        }
    </script>
    <link rel="stylesheet" href="users.css">
</head>
<body>
    <h1>Gestor de Usuarios</h1>
    
    <!--Muestro la informacion del usuario conectado-->
    <p>
        Conectado como: <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong> 
        | <a href="logout.php">Cerrar sesión</a>
    </p>

    <!--Muestro los mensajes de exito-->
    <?php if ($success): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <!--Muestro los mensajes de exito-->
    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <!--Enlace para poder crear un nuevo usuario-->
    <p><a href="nuevo_usuario_admin.php">➕ Crear nuevo usuario</a></p>

    <!--Tabla de los usuarios-->
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
            <!--Muestro un mensaje si no hay usuarios-->
            <?php if (empty($users)): ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No hay usuarios registrados.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['nombre_usuario']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td class="actions">
                        <!--Enlace para poder editar-->
                        <a href="edit_user.php?id=<?= $user['id'] ?>">✏️ Editar</a>
                        
                        <!--Enlace para poder eliminar-->
                        <?php if ($user['id'] != $_SESSION['user_id']): ?>
                            <!--Solo muestro eliminar si no es el usuario actual-->
                            <a href="#" onclick="confirmarEliminar(<?= $user['id'] ?>, '<?= htmlspecialchars($user['nombre_usuario']) ?>')" 
                               class="delete">🗑️ Eliminar</a>
                        <?php else: ?>
                            <span style="color: #999;">(Tú)</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>