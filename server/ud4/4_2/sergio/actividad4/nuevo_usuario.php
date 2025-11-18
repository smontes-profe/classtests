<?php
//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';

//Array para que se guarde los mensajes de error y exito
$errors = [];
$success = '';

//Solo se procesa el formulario si se envia por post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//Limpio los espacios de los campos del formulario
$nombre = trim($_POST['nombre_usuario'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

//Valido que no esten vacios
if ($nombre === '' || $email === '' || $password === '') {
$errors[] = 'Todos los campos son obligatorios.';
}

//Si no hay error de validacion, se intenta insertar en la base de datos
if (empty($errors)) {
try {
$pdo = new PDO($dsn, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//Primero se comprueba si el email existe en la base de datos
$stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email');
$stmt->execute([':email' => $email]);

//Si el fetch me devuelve algo significa que el email esta registrado
if ($stmt->fetch()) {
$errors[] = 'El email ya está registrado.';
} else {

//Hasheo la contraseña para protegerla
$hash = password_hash($password, PASSWORD_DEFAULT);

//Preparo y ejecuto el insert del nuevo usuario
$insert = $pdo->prepare('INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre, :email, :pass)');
$insert->bindValue(':nombre', $nombre);
$insert->bindValue(':email', $email);
$insert->bindValue(':pass', $hash);
$insert->execute();

//Mensaje de que todo ha salido bien
$success = 'Usuario registrado correctamente.';
}

//Mensaje de error por si algo no funciona
} catch (PDOException $e) {
$errors[] = 'Error: ' . $e->getMessage();
}
}
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Nuevo usuario</title>
</head>
<body>
<h1>Registrar nuevo usuario</h1>

<!--Muestro errores si los hay-->
<?php foreach ($errors as $err): ?>
<p style="color:red"><?= htmlspecialchars($err) ?></p>
<?php endforeach; ?>

<!--Mensaje para cuando funciona bien-->
<?php if ($success): ?>
<p style="color:green"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<!--Formulario para registrarte-->
<form method="post">
<label>Nombre de usuario: <input type="text" name="nombre_usuario"></label><br>
<label>Email: <input type="email" name="email"></label><br>
<label>Password: <input type="password" name="password"></label><br>
<button type="submit">Crear</button>
</form>
</body>
</html>