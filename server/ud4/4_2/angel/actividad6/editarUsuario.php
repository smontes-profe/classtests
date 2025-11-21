<?php
require_once "../actividad1/config.php";
session_start();

// Comprobar si hay sesión activa (seguridad básica)
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

// Verificar si viene el ID por GET
if (!isset($_GET["id"])) {
    die("ID de usuario no especificado.");
}

$id = $_GET["id"];

try {
    // Obtener los datos actuales del usuario
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        die("Usuario no encontrado.");
    }

    // Si se envía el formulario, actualizar datos
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = trim($_POST["nombre_usuario"]);
        $email = trim($_POST["email"]);

        // Validación básica
        if (empty($nombre) || empty($email)) {
            echo "Por favor, completa todos los campos.";
        } else {
            $stmt = $pdo->prepare("UPDATE usuarios SET nombre_usuario = :nombre, email = :email WHERE id = :id");
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            echo "✅ Usuario actualizado correctamente.";
            // Refrescar los datos del usuario
            $usuario["nombre_usuario"] = $nombre;
            $usuario["email"] = $email;
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>

<body>
    <h2>Editar Usuario</h2>

    <form method="post" action="editarUsuario.php?id=<?= htmlspecialchars($id) ?>">
        <label>Nombre de usuario:</label><br>
        <input type="text" name="nombre_usuario" value="<?= htmlspecialchars($usuario['nombre_usuario']) ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>"><br><br>

        <input type="submit" value="Guardar cambios">
    </form>

    <p><a href="usuarios.php">← Volver al listado</a></p>
</body>

</html>