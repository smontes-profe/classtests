
<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../sesion_usuarios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    try {
        $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        $stmt = $pdo->prepare("SELECT id, nombre_usuario, email, password FROM usuarios WHERE email = :e");
        $stmt->execute([':e' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = ['id'=>$user['id'], 'nombre'=>$user['nombre_usuario'], 'email'=>$user['email']];
            flash_set('ok', 'Has iniciado sesión correctamente.');
            header('Location: /usuarios/listar.php');
            exit;
        } else {
            flash_set('error', 'Credenciales incorrectas');
        }
    } catch (PDOException $e) {
        flash_set('error', 'Error de base de datos');
    }
}
?>


<!doctype html>
<html lang="es"><head><meta charset="utf-8">
<title>Login</title></head>

<body>
  <h1>Login</h1>

  <?php flash_show(); ?>

  <form method="post">
    <label>Email</label>
    <input type="email" style="background-color: purple" name="email" required>
    <label>Contraseña</label>
    <input type="password" style="background-color: purple" name="password" required>
    <button type="submit" style="background-color: purple">Entrar</button>
  </form>

  <p><a href="/usuarios/registrar.php" style="background-color: purple">Registrarse</a></p>
</body>
</html>


