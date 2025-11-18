<?php

// Config y sesión
require_once __DIR__ . '/../1/config.php';
session_start();

// Si ya está autenticado, evitar volver al login
if (!empty($_SESSION['user_id'])) {
  header('Location: usuarios.php');
  exit;
}

$errors = [];

// Procesar envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sanitizar entrada
  $email = trim($_POST['email'] ?? '');
  $pass  = $_POST['password'] ?? '';

  // Validaciones básicas
  if ($email === '' || $pass === '') {
    $errors[] = 'Rellena ambos campos.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email no válido.';
  } else {
    try {
      $pdo = new PDO($dsn, $db_user, $db_pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Recuperar usuario por email
      $stmt = $pdo->prepare('SELECT id, nombre_usuario, password FROM usuarios WHERE email = :email');
      $stmt->execute([':email' => $email]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      // Verificar contraseña contra el hash almacenado
      if ($user && password_verify($pass, $user['password'])) {
        // Guardar datos mínimos en la sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre_usuario'];
        session_regenerate_id(true); // evitar fijación de sesión
        header('Location: usuarios.php');
        exit;
      } else {
        $errors[] = 'Credenciales incorrectas.';
      }
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
        <?php foreach ($errors as $err): ?>
            <p style="color:red;"><?= htmlspecialchars($err) ?></p>
        <?php endforeach; ?>

        <form method="post" novalidate>
            <label>Email:<br>
            <input type="email" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
            </label><br>

            <label>Contraseña:<br>
            <input type="password" name="password">
            </label><br>

            <button type="submit">Entrar</button>
        </form>

        <p>¿No tienes cuenta? <a href="registrar.php">Regístrate</a></p>
    </body>
</html>
