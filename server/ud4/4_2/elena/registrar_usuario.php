
<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../sesion_usuarios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nombre === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
        flash_set('error', 'Datos no válidos');
    } else {
        try {
            $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);

            $existe = $pdo->prepare("SELECT id FROM usuarios WHERE email=:e");
            $existe->execute([':e'=>$email]);

            if ($existe->fetch()) {
                flash_set('error', 'Email ya registrado');
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $ins = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:n,:e,:p)");
                $ins->execute([':n'=>$nombre, ':e'=>$email, ':p'=>$hash]);
                flash_set('ok', 'Usuario registrado');
                header('Location: /usuarios/login.php');
                exit;
            }
        } catch (PDOException $e) {
            flash_set('error', 'Error de base de datos');
        }
    }
}
?>


<!doctype html>
<html lang="es"><head><meta charset="utf-8">
<title>Registro</title></head>

<body>

  <h1>Registro</h1>

  <?php flash_show(); ?>

  <form method="post">
    <label>Nombre de usuario</label>
    <input type="text" style="background-color: purple" name="nombre_usuario" required>
    <label>Email</label>
    <input type="email" style="background-color: purple" name="email" required>
    <label>Contraseña</label>
    <input type="password" style="background-color: purple" name="password" required>
    <button type="submit" style="background-color: purple">Crear cuenta</button>
  </form>

  <p><a href="/usuarios/login.php" style="background-color: purple">Volver al login</a></p>

</body>
</html>


