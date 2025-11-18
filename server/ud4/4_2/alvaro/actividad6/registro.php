<?php
// Definimos el título de la página (lo usará el header.php)
$titulo_pagina = 'Registro de Usuario';

// Incluimos la cabecera (conexión, session_start, etc)
require_once 'includes/header.php';

// --- Lógica del Formulario ---
// Comprobamos si el formulario se ha enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recogemos los datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // --- Validación ---
    // 1. Comprobar que no estén vacíos
    if (empty($nombre_usuario) || empty($email) || empty($password)) {
        $error = "Por favor, completa todos los campos.";
        // 2. Comprobar que el email tenga un formato válido
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El formato del email no es válido.";
    } else {
        // Si las validaciones son correctas...

        // 3. ¡IMPORTANTE! Ciframos la contraseña
        // Nunca guardamos la contraseña en texto plano
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        // 4. Intentamos la conexión y la inserción
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 5. Comprobar si el email ya existe (evitar duplicados)
            $sql_check = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->execute([':email' => $email]);

            // fetchColumn() nos devuelve el resultado (el número 0 o 1)
            if ($stmt_check->fetchColumn() > 0) {
                // Si es > 0, el email ya existe
                $error = "El correo electrónico ya está registrado.";
            } else {
                // 6. Si no existe, preparamos la inserción (consulta preparada)
                $sql_insert = "INSERT INTO usuarios (nombre_usuario, email, password) 
                               VALUES (:nombre, :email, :pass)";
                $stmt_insert = $pdo->prepare($sql_insert);

                // 7. Ejecutamos la inserción pasando los datos en un array
                $stmt_insert->execute([
                    ':nombre' => $nombre_usuario,
                    ':email' => $email,
                    ':pass' => $hash_password // Guardamos el HASH, no el password
                ]);
                $mensaje = "¡Usuario registrado con éxito! Ya puedes iniciar sesión.";
            }
        } catch (PDOException $e) {
            // Capturamos cualquier error de la BBDD
            $error = "Error al registrar el usuario: " . $e->getMessage();
        }
    }
}
?>

<h2>Registro de Nuevo Usuario</h2>

<form action="registro.php" method="POST">

    <?php if ($mensaje): ?><p class="success"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <div>
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <input type="submit" value="Registrar">
    </div>
</form>
<?php
require_once 'includes/footer.php';
?>