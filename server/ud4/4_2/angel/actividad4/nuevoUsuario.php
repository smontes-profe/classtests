<?php
require_once "../actividad1/config.php";

try {
    // Conexión a la base de datos
    $conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre_usuario = trim($_POST["nombre_usuario"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($nombre_usuario) && !empty($email) && !empty($password)) {
        try {
            // Comprobar si el email ya existe
            $check = $conexion->prepare("SELECT id FROM usuarios WHERE email = :email");
            $check->bindValue(":email", $email, PDO::PARAM_STR);
            $check->execute();

            if ($check->rowCount() > 0) {
                $mensaje = "❌ El email ya está registrado.";
            } else {
                // Cifrar contraseña
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                // Insertar nuevo usuario
                $sql = "INSERT INTO usuarios (nombre_usuario, email, password) 
                        VALUES (:nombre_usuario, :email, :password)";
                $stmt = $conexion->prepare($sql);
                $stmt->bindValue(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
                $stmt->bindValue(":email", $email, PDO::PARAM_STR);
                $stmt->bindValue(":password", $password_hash, PDO::PARAM_STR);
                $stmt->execute();

                $mensaje = "✅ Usuario registrado correctamente.";
            }
        } catch (PDOException $e) {
            $mensaje = "Error al registrar el usuario: " . $e->getMessage();
        }
    } else {
        $mensaje = "Por favor, rellena todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Usuario</title>
</head>

<body>

    <h2>Registrar Nuevo Usuario</h2>

    <form method="post" action="">
        <label>Nombre de usuario:</label><br>
        <input type="text" name="nombre_usuario"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password"><br><br>

        <input type="submit" value="Registrar">
    </form>

    <p><?php echo $mensaje; ?></p>

</body>

</html>