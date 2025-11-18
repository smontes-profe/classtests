<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['session_id'])) {
    $customId = $_POST['session_id'];
    session_id($customId); // Establecer el ID personalizado antes de iniciar la sesión
}
session_start();
$sessionId = session_id();

// Guardar el rol "Administrador" en la sesión
$_SESSION['rol'] = "Administrador";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID de Sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>ID de Sesión</h1>
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="session_id">Introduce tu ID de sesión:</label>
            <input type="text" id="session_id" name="session_id" value="<?php echo htmlspecialchars($sessionId); ?>" required>
            <div class="actions">
                <button type="submit" class="button">Establecer ID de Sesión</button>
            </div>
        </form>

        <div class="result">
            <p>El ID de la sesión actual es:</p>
            <p class="session-id"><code><?php echo htmlspecialchars($sessionId); ?></code></p>
            <p>Rol almacenado en la sesión:</p>
            <p class="session-id"><code><?php echo htmlspecialchars($_SESSION['rol']); ?></code></p>
        </div>

        <div class="note">
            <p>Puedes:</p>
            <ul>
                <li>Introducir un nuevo ID y hacer clic en "Establecer ID de Sesión"</li>
                <li>Refrescar la página para comprobar que el ID y el rol se mantienen</li>
                <li>Los datos se mantendrán mientras no cierres el navegador</li>
            </ul>
        </div>

        <div class="actions">
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="button">Refrescar Página</a>
            <a href="index.html" class="button secondary">Volver al Inicio</a>
        </div>
    </div>
</body>
</html>