
// Actividad 4
<?php

require_once __DIR__ . '/config.php';

$errores = [];
$exito = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  if ($nombre_usuario === '') $errores[] = 'Usuario vacío/no válido';
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = 'Email vacío/no válido';
  if (strlen($password) < 6) $errores[] = 'Contraseña vacía/no válida';

  if (!$errores) {

    try {

      $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
      ]);

      $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
      $check->bindValue(':email', $email, PDO::PARAM_STR);
      $check->execute();

      if ($check->fetch()) {
        $errores[] = 'Ya existe ese usuario';
      } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $ins = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:n, :e, :p)");
        $ins->bindValue(':n', $nombre_usuario, PDO::PARAM_STR);
        $ins->bindValue(':e', $email, PDO::PARAM_STR);
        $ins->bindValue(':p', $hash, PDO::PARAM_STR);
        $ins->execute();
        $exito = true;
      }
    } catch (PDOException $e) {
        $errores[] = 'Error de base de datos: ' . htmlspecialchars($e->getMessage());
    }
  }
}
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Nuevo usuario</title>

  <style>
    label { display:block; margin:.5rem 0 .25rem; }
    input[type=text], input[type=email], input[type=password]{ width: 300px; padding:.4rem; height: 23px; }
    .error { color: #b00020; }
    .ok { color: #0a7b00; }
  </style>

</head>

<body>
  <h1>Registro de usuario</h1>

  <?php if ($exito): ?>
    <p class="ok">Usuario creado correctamente.</p>
  <?php endif; ?>

  <?php if ($errores): ?>
    <ul class="error">
      <?php foreach ($errores as $er): ?><li><?= htmlspecialchars($er) ?></li><?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <form method="post" novalidate>
    <label>Nombre de usuario</label>
    <input type="text" name="nombre_usuario" placeholder="Nombre usuario" required value="<?= htmlspecialchars($_POST['nombre_usuario'] ?? '') ?>">
    <label>Email</label>
    <input type="email" name="email" placeholder="Email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
    <label>Contraseña</label>
    <input type="password" placeholder="Contraseña" name="password" required><br><br>
    <button type="submit" style="background-color: purple">Crear</button>
  </form>
</body>
</html>


