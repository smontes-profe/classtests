<?php

//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';
session_start();

//Verifico que el usuario este logueado
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$errors = [];
$success = '';

//Para cuando se envia el formulario de crear usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    //Se valida que no esten vacios
    if (empty($nombre) || empty($email) || empty($password)) {
        $errors[] = 'Todos los campos son obligatorios.';
    } else {
        try {
            $pdo = new PDO($dsn, $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Verifico si el email existe para evitar duplicados
            $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email');
            $stmt->execute([':email' => $email]);
            
            //Si el fetch devuelve algo el email ya esta registrado
            if ($stmt->fetch()) {
                $errors[] = 'El email ya está registrado.';
            } else {
                //Para crear un nuevo usuario
                $hash = password_hash($password, PASSWORD_DEFAULT);//Hasheo la contraseña
                $stmt = $pdo->prepare('INSERT INTO usuarios (nombre_usuario, email, password) VALUES (?, ?, ?)');
                $stmt->execute([$nombre, $email, $hash]);
                
                $success = 'Usuario creado correctamente.';
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
    <title>Crear Nuevo Usuario</title>
</head>
<body>
    <h1>Crear Nuevo Usuario</h1>
    
    <p><a href="users.php">← Volver a la lista</a></p>
    <!--Muestro errores si los hay-->
    <?php foreach ($errors as $error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endforeach; ?>
    <!--Muestro mensaje de exito si se ha creado correctamente-->
    <?php if ($success): ?>
        <p style="color: green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <!--Formulario para crear el usuario-->
    <form method="post">
        <p>
            <label>Nombre de usuario:</label><br>
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
        
        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>