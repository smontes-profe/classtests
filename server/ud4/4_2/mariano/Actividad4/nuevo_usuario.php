<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
</head>
<body>
    <form action="">
        nombre_de_usuario: <input type="text" name="nombre_usuario">
        email: <input type="text" name="email">
        password : <input type="text" name="password">
        <input type="submit" value="Crear Usuario">
    </form>
<?php
if (isset($_GET['nombre_usuario']) && isset($_GET['email']) && isset($_GET['password'])) {
    try {
        $nombre_de_usuario = trim($_GET['nombre_usuario']);
        $email = trim($_GET['email']);
        $password = trim($_GET['password']);

        $sql = "INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre_usuario, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'nombre_usuario' => $nombre_de_usuario,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        echo "<p>Usuario creado exitosamente.</p>";

    } catch (PDOException $e) {
        echo "<p>Error al crear el usuario: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}  

?>
</body>
</html>