<?php
require_once 'conexion.php';

$mensaje = ""; // Mensajes para el usuario (éxito o error)

// 1. Comprobar si el formulario se envió con POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. Obtener datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    // 3. Validación simple
    if (empty($nombre_usuario) || empty($email) || empty($password)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El formato del email no es válido.";
    } else {
        
        try {
            // 4. 🔒 Comprobar si el email ya existe (como pide el enunciado)
            $sql_check = "SELECT id FROM usuarios WHERE email = :email";
            $stmt_check = $pdo->prepare($sql_check);
            // Usamos bindValue como se pide
            $stmt_check->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt_check->execute();

            if ($stmt_check->rowCount() > 0) {
                $mensaje = "Error: El email introducido ya está registrado.";
            } else {
                
                // 5. 🔒 Hashear la contraseña
                // ¡NUNCA guardes contraseñas en texto plano!
                // PASSWORD_DEFAULT usa el algoritmo más seguro disponible (actualmente Bcrypt)
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                // 6. Preparar la consulta de INSERCIÓN
                $sql_insert = "INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre, :email, :pass_hash)";
                $stmt_insert = $pdo->prepare($sql_insert);

                // 7. 🔒 Vincular valores (bindValue)
                $stmt_insert->bindValue(':nombre', $nombre_usuario, PDO::PARAM_STR);
                $stmt_insert->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt_insert->bindValue(':pass_hash', $password_hash, PDO::PARAM_STR);

                // 8. Ejecutar la inserción
                $stmt_insert->execute();

                $mensaje = "¡Usuario registrado con éxito!";
            }

        } catch (PDOException $e) {
            // Manejar errores (por ejemplo, si falla la BBDD)
            $mensaje = "Error al registrar el usuario: " . $e->getMessage();
        }
    }
}

// Cerrar conexión (se cierra al final del script)
$pdo = null;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; display: grid; place-items: center; min-height: 90vh; }
        .container { border: 1px solid #ccc; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 300px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .mensaje { text-align: center; margin-top: 15px; padding: 10px; border-radius: 4px; }
        .mensaje.exito { background-color: #d4edda; color: #155724; }
        .mensaje.error { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Registro de Nuevo Usuario</h2>
        
        <?php if ($mensaje): ?>
            <div class="mensaje <?php echo strpos($mensaje, 'Éxito') !== false ? 'exito' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <form action="nuevo_usuario.php" method="POST">
            <div classm-group">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Registrar</button>
        </form>
    </div>

</body>
</html>