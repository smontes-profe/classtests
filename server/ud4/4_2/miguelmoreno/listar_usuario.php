
<?php

require_once  'config.php';
require_once  'sesion_usuarios.php';
require_once  'sesion2_empleados.php';

auth_require();

try {
  $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ]);

  $usuarios = $pdo->query("SELECT id, nombre_usuario, email FROM usuarios ORDER BY id")->fetchAll();
} catch (PDOException $e) {
    flash_set('error', 'Error');
    $usuarios = [];
}
?>


<!doctype html>
<html lang="es"><head><meta charset="utf-8">
<title>Usuarios</title></head>

<body>
  <h1>Usuarios</h1>
  <?php flash_show(); ?>
  <p><a href="/usuarios/registrar.php">Crear nuevo</a> | <a href="/usuarios/logout.php" style="background-color: purple">Salir</a></p>
  <table border="1" cellpadding="6" cellspacing="0">
    <tr><th>ID</th><th style="background-color: purple">Nombre</th><th style="background-color: purple">Email</th><th style="background-color: purple">Editar</th><th style="background-color: purple">Eliminar</th></tr>
    <?php foreach ($usuarios as $u): ?>
      <tr>
        <td><?= htmlspecialchars($u['id']) ?></td>
        <td><?= htmlspecialchars($u['nombre_usuario']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td><a href="/usuarios/editar.php?id=<?= urlencode($u['id']) ?>" style="background-color: purple">Editar</a></td>
        <td><a href="/usuarios/eliminar.php?id=<?= urlencode($u['id']) ?>" onclick="return confirm('¿Eliminar usuario #<?= htmlspecialchars($u['id']) ?>?')" style="background-color: purple">Eliminar</a></td>
      </tr>

    <?php endforeach; ?>
    
  </table>
</body>
</html>


