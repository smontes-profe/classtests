<?php
// Mostramos errores para ayudarnos a depurar
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluimos la configuración de la BBDD
require_once 'config.php';

// Variables para mostrar mensajes al usuario en el HTML
$mensaje = '';
$error = '';

// 1. Miramos si el formulario se ha enviado (si el método es POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. Recogemos los datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 3. Validación simple (que no estén vacíos)
    if (empty($nombre_usuario) || empty($email) || empty($password)) {
        $error = "Por favor, completa todos los campos.";
    } else {

        // 4. ¡IMPORTANTE! Ciframos la contraseña
        // Nunca guardamos la contraseña en texto plano
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        // 5. Intentamos la conexión y la inserción
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 6. Comprobar si el email ya existe (evitar duplicados)
            $sql_check = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->execute([':email' => $email]); // Pasamos el email al execute

            // fetchColumn() nos devuelve el resultado (el número 0 o 1)
            if ($stmt_check->fetchColumn() > 0) {
                // Si es > 0, el email ya existe
                $error = "El correo electrónico ya está registrado.";
            } else {
                // 7. Si no existe, preparamos la inserción (consulta preparada)
                $sql_insert = "INSERT INTO usuarios (nombre_usuario, email, password) 
                               VALUES (:nombre, :email, :pass)";
                $stmt_insert = $pdo->prepare($sql_insert);

                // 8. Vinculamos los valores (como pide la Actividad 4)
                $stmt_insert->bindValue(':nombre', $nombre_usuario);
                $stmt_insert->bindValue(':email', $email);
                // Guardamos el HASH, no la contraseña original
                $stmt_insert->bindValue(':pass', $hash_password);

                // 9. Ejecutamos la inserción
                $stmt_insert->execute();

                $mensaje = "¡Usuario registrado con éxito!";
            }
        } catch (PDOException $e) {
            // Capturamos cualquier error de la BBDD
            $error = "Error al registrar el usuario: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividad 4: Registrar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Actividad 4: Nuevo Usuario</h2>
    <p>Registra un nuevo usuario con contraseña cifrada.</p>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

        <?php // Aquí mostramos los mensajes de éxito o error
        if ($mensaje): ?>
            <p class="success"><?= $mensaje ?></p>
        <?php endif; ?>
        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <div>
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <input type="submit" value="Registrar">
        </div>
    </form>
</body>

</html>