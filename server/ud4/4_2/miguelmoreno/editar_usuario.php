
<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../sesion_usuarios.php';
require_once __DIR__ . '/../sesion2_empleados.php';

auth_require();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { header('Location: /usuarios/listar.php'); exit; }

try {

    $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim($_POST['nombre_usuario'] ?? '');
        $email = trim($_POST['email'] ?? '');
        if ($nombre === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            flash_set('error', 'Datos no válidos');
        } else {
            $check = $pdo->prepare("SELECT id FROM usuarios WHERE email=:e AND id<>:id");
            $check->execute([':e'=>$email, ':id'=>$id]);
            if ($check->fetch()) {
                flash_set('error', 'Ese email ya existe');
            } else {
                $upd = $pdo->prepare("UPDATE usuarios SET nombre_usuario=:n, email=:e WHERE id=:id");
                $upd->execute([':n'=>$nombre, ':e'=>$email, ':id'=>$id]);
                flash_set('ok', 'Usuario actualizado');
                header('Location: /usuarios/listar.php');
                exit;
            }
        }
    }

    $stmt = $pdo->prepare("SELECT id, nombre_usuario, email FROM usuarios WHERE id=:id");
    $stmt->execute([':id'=>$id]);
    $u = $stmt->fetch();
    if (!$u) { flash_set('error', 'Usuario no encontrado'); header('Location: /usuarios/listar.php'); exit; }

} catch (PDOException $e) {
    flash_set('error', 'Error de base de datos');
    header('Location: /usuarios/listar.php'); exit;
}
?>


<!doctype html>
<html lang="es"><head><meta charset="utf-8">
<title>Editar usuario</title></head>

<body>

  <h1>Editar usuario</h1>

  <?php flash_show(); ?>

  <form method="post">
    <label>Nombre</label>
    <input type="text" name="nombre_usuario" style="background-color: purple" required value="<?= htmlspecialchars($u['nombre_usuario']) ?>">
    <label>Email</label>
    <input type="email" name="email" style="background-color: purple" required value="<?= htmlspecialchars($u['email']) ?>">
    <button type="submit" style="background-color: purple">Guardar</button>
    <a href="/usuarios/listar.php">Volver</a>
  </form>

</body>
</html>


