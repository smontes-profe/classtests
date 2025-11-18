<?php

//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';

//Array para guardar los mensajes de error y exito
$errors = [];
$success = '';

//Cuando se envia el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Limpio los datos del formulario
    $nombre = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    //Valido que no este vacio
    if (empty($nombre) || empty($email) || empty($password)) {
        $errors[] = 'Todos los campos son obligatorios.';
    } else {
        try {
            $pdo = new PDO($dsn, $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Verifico si el email ya existe en la base de datos
            $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = ?');
            $stmt->execute([$email]);
            
            //Si encuentra un usuario con ese email muestro el error
            if ($stmt->fetch()) {
                $errors[] = 'El email ya está registrado.';
            } else {
                //Crear el usuario nuevo si todo esta validado correctamente
                $hash = password_hash($password, PASSWORD_DEFAULT);//hasheo la contraseña
                $stmt = $pdo->prepare('INSERT INTO usuarios (nombre_usuario, email, password) VALUES (?, ?, ?)');
                $stmt->execute([$nombre, $email, $hash]);
                //Mensaje de exito si todo ha salido bien con enlace al login
                $success = 'Usuario registrado correctamente. <a href="login.php">Iniciar sesión</a>';
            }
        //Muestro error si hay algun error con la base de datos
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
    <title>Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <!--Muestro errores de validacion si los hay-->
    <?php foreach ($errors as $error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endforeach; ?>
    <!--Muestro mensaje de exito si todo salio bien-->
    <?php if ($success): ?>
        <p style="color: green;"><?= $success ?></p>
    <?php endif; ?>
    <!--Formulario del regiistro-->
    <form method="post">
        <p>
            <label>Nombre:</label><br>
            <input type="text" name="nombre_usuario" required>
        </p>
        
        <p>
            <label>Email:</label><br>
            <input type="email" name="email" required>
        </p>
        
        <p>
            <label>Contraseña:</label><br>
            <input type="password" name="password" required>
        </p>
        
        <button type="submit">Registrar</button>
    </form>
    <!--Enlace por si ya tienes cuenta para que inicies sesion-->
    <p><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>
</body>
</html>