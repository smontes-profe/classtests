<?php

//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';
session_start();

//Si ya esta autentificado, lo mando a users.php(asi evito que vuelva al login si esta logueado)
if (!empty($_SESSION['user_id'])) {
    header('Location: users.php');
    exit;
}

//Array para guardar los errores de login
$errors = [];

//Cuando se envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Limpio los datos del formulario
    $email = trim($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';

    //Valido que no esten vacios
    if ($email === '' || $pass === '') {
        $errors[] = 'Rellena ambos campos.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Valido que el email tenga el formato correcto
        $errors[] = 'Email no válido.';
    } else {
        try {
            $pdo = new PDO($dsn, $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Busco el usuario por email en la base de datos
            $stmt = $pdo->prepare('SELECT id, nombre_usuario, password FROM usuarios WHERE email = :email');
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            //Verifico si el usuario existe y si la contraseña coincide
            //password_verify compara la contraseña del form con el hash de la base de datos
            if ($user && password_verify($pass, $user['password'])) {
                //Cuando la autentificacion es correcta se crea la sesion y se guarda los datos del usuario en la sesion
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nombre_usuario'];
                //Regenero el id de sesion(para mas seguridad)
                session_regenerate_id(true);
                //Reedirijo a la pagina principal
                header('Location: users.php');
                exit;
            } else {
                //Mensaje de error si las credenciales son incorrectas
                $errors[] = 'Credenciales incorrectas.';
            }
        //Muestro error si hay algun error con la base de datos
        } catch (PDOException $e) {
            $errors[] = 'Error en la base de datos: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Gestor</title>
</head>
<body>
  <h1>Login</h1>
  <!--Muestro errores si los hay-->
  <?php foreach ($errors as $err): ?>
    <p style="color:red;"><?= htmlspecialchars($err) ?></p>
  <?php endforeach; ?>

  <form method="post" novalidate>
    <label>Email:<br>
    <!--value mantiene el email escrito si hay algun error-->
      <input type="email" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
    </label><br><br>

    <label>Contraseña:<br>
      <input type="password" name="password">
    </label><br><br>

    <button type="submit">Entrar</button>
  </form>

  <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
</body>
</html>
