<?php
//http://localhost/2do_servidor/ud4/actividad4/nuevo_usuario.php
require_once __DIR__ . '/../actividad1/conexion.php'; // aquí ya se crea el pdo

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (!$nombre_usuario)  $errors[] = "Nombre de usuario requerido";
    if (!$email)           $errors[] = "Email incorrecto.";
    if (strlen($password) < 6) $errors[] = "Contraseña debe contener al menos 6 caracteres";

    if (empty($errors)) {
        try {

            // comprobar si el email está duplicado
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->fetch()) {
                $errors[] = "El email ya existe.";
                
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $insert = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre, :email, :pass)");
                $insert->bindValue(':nombre', $nombre_usuario);
                $insert->bindValue(':email', $email);
                $insert->bindValue(':pass', $hash);
                $insert->execute();

                $success = true;
            }

        } catch (PDOException $e) {
            $errors[] = "Error BD: " . htmlspecialchars($e->getMessage());
        }
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>actividad4</title></head>
<body>

<h1>Registro de usuario</h1>

<?php if($success): ?>
    <p>Usuario creado correctamente.</p>
<?php endif; ?>

<?php foreach($errors as $err): ?>
    <p style="color:red;"><?=htmlspecialchars($err)?></p>
<?php endforeach; ?>

<form method="post">
  <label>Usuario: <input name="nombre_usuario" value="<?=htmlspecialchars($_POST['nombre_usuario'] ?? '')?>"></label><br><br>
  <label>Email: <input name="email" value="<?=htmlspecialchars($_POST['email'] ?? '')?>"></label><br><br>
  <label>Contraseña: <input type="password" name="password"></label><br><br>
  <button type="submit">Crear</button>
</form>

</body>
</html>