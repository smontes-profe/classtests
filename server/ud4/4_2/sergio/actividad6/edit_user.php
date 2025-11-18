<?php

//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';
session_start();

//Si no hay un usuario en la sesion  lo mando al login
if (empty($_SESSION['user_id'])) { header('Location: login.php'); exit; }

//Cojo el id del usuario que quiero editar
$id = $_GET['id'] ?? null;

//Si no hay ID se corta, no se puede editar sin saber que usuario
if (!$id) die('ID faltante.');

//Array para guardas los errores de validacion
$errors = [];

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Si se envia el formulario se actualiza cuando el usuario hace click en guardarr
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Limpio los espacios de los campos del formulario
        $nombre = trim($_POST['nombre_usuario'] ?? '');
        $email = trim($_POST['email'] ?? '');

        //Valido que no esten vacios
        if ($nombre === '' || $email === '') {
            $errors[] = 'Los campos no pueden estar vacíos.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //Valido el email
            $errors[] = 'Email no válido.';
        } else {
            //Evito que se duplique el email comprobando que otro id tenga el mismo
            $check = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email AND id != :id');
            $check->execute([':email' => $email, ':id' => $id]);

            //Mustro un mensaje para cuando hay otro id con el mismo email
            if ($check->fetch()) {
                $errors[] = 'El email ya está en uso por otro usuario.';
            } else {
              //Si todo esta bien actualizo el usuario en la base de datos
                $upd = $pdo->prepare('UPDATE usuarios SET nombre_usuario = :n, email = :e WHERE id = :id');
                $upd->execute([':n' => $nombre, ':e' => $email, ':id' => $id]);
                //Reedirijo a la lista de usuarios
                header('Location: users.php');
                exit;
            }
        }
    }

    //Obtengo los datos actuales del usuario para mostrarlos en el usuario 
    $stmt = $pdo->prepare('SELECT id, nombre_usuario, email FROM usuarios WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //Si no existe el usuario muestro un error
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
  <!--Muestro errores si los haay-->
  <?php foreach ($errors as $err): ?><p style="color:red;"><?= htmlspecialchars($err) ?></p><?php endforeach; ?>

  <form method="post" novalidate>
    <label>Usuario:<br>
    <!--Hago que value muestre el nombre actual del usuario-->
      <input name="nombre_usuario" value="<?= htmlspecialchars($user['nombre_usuario']) ?>">
    </label><br><br>

    <label>Email:<br>
      <input name="email" type="email" value="<?= htmlspecialchars($user['email']) ?>">
    </label><br><br>

    <button type="submit">Guardar</button>
  </form>

  <p><a href="users.php">Volver</a></p>
</body>
</html>
