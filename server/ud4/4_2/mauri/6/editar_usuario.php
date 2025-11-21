<?php

// Config y sesión
require_once __DIR__ . '/../1/config.php';
session_start();

// Proteger: solo accesible con sesión activa
if (empty($_SESSION['user_id'])) { header('Location: login.php'); exit; }

// ID del usuario a editar (desde querystring)
$id = $_GET['id'] ?? null;
if (!$id) die('ID faltante.');

$errors = [];

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Si se envía POST: validar y actualizar
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Validación mínima
    if ($nombre === '' || $email === '') {
      $errors[] = 'Los campos no pueden estar vacíos.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Email no válido.';
    } else {
      // Evitar duplicados: otro usuario con mismo email
      $check = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email AND id != :id');
      $check->execute([':email' => $email, ':id' => $id]);
      if ($check->fetch()) {
        $errors[] = 'El email ya está en uso por otro usuario.';
      } else {
        // Actualizar datos del usuario
        $upd = $pdo->prepare('UPDATE usuarios SET nombre_usuario = :n, email = :e WHERE id = :id');
        $upd->execute([':n' => $nombre, ':e' => $email, ':id' => $id]);
        header('Location: usuarios.php'); // redirect on success
        exit;
      }
    }
  }

  // Obtener datos actuales para prefijar el formulario
  $stmt = $pdo->prepare('SELECT id, nombre_usuario, email FROM usuarios WHERE id = :id');
  $stmt->execute([':id' => $id]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$user) die('Usuario no encontrado.');

//Muestro error si hay algun error con la base de datos
} catch (PDOException $e) {
    die('Error en la base de datos: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Editar usuario</title>
    </head>
    <body>
        <h1>Editar usuario #<?= htmlspecialchars($user['id']) ?></h1>
        <?php foreach ($errors as $err): ?><p style="color:red;"><?= htmlspecialchars($err) ?></p><?php endforeach; ?>

        <form method="post" novalidate>
            <label>Usuario:<br>
            <input name="nombre_usuario" value="<?= htmlspecialchars($user['nombre_usuario']) ?>">
            </label><br><br>

            <label>Email:<br>
            <input name="email" type="email" value="<?= htmlspecialchars($user['email']) ?>">
            </label><br><br>

            <button type="submit">Guardar</button>
        </form>

        <p><a href="usuarios.php">Volver</a></p>
    </body>
</html>
