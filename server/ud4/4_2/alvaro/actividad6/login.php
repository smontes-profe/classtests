<?php
// Definimos el título de la página
$titulo_pagina = 'Login';

// Incluimos la cabecera (conexión, session_start, etc)
require_once 'includes/header.php';

// --- Lógica de Seguridad ---
// Si el usuario YA está logueado, no tiene sentido que vea el login.
// Lo "echamos" al dashboard.
if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit; // Paramos el script
}

// --- Lógica del Formulario ---
// Comprobamos si el formulario se ha enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recogemos los datos del POST
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validación (que no estén vacíos)
    if (empty($email) || empty($password)) {
        $error = "Email y contraseña son obligatorios.";
    } else {

        // Si los datos están, intentamos conectar
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 1. Buscamos al usuario por su email (consulta preparada)
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email]);

            // Guardamos el resultado (o 'false' si no lo encuentra)
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // 2. ¡La clave de la Act 6! Verificamos la contraseña
            // Comprobamos si SÍ encontró un usuario Y si la contraseña coincide con el hash
            if ($usuario && password_verify($password, $usuario['password'])) {

                // 3. ¡Contraseña correcta! Guardamos sus datos en la sesión
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre_usuario'];

                // 4. Lo mandamos a la página privada (dashboard)
                header("Location: dashboard.php");
                exit; // Paramos script

            } else {
                // Si $usuario es false o la contraseña es incorrecta
                $error = "Email o contraseña incorrectos.";
            }
        } catch (PDOException $e) {
            // Capturamos cualquier error de la BBDD
            $error = "Error de conexión: " . $e->getMessage();
        }
    }
}
?>
<h2>Iniciar Sesión</h2>
<form action="login.php" method="POST">

    <?php if ($error): ?><p class="error"><?= $error ?></p><?php endif; ?>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <input type="submit" value="Entrar">
    </div>
</form>
<?php
require_once 'includes/footer.php';
?>