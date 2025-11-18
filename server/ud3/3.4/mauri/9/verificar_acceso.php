<?php
session_start();
$tieneAcceso = isset($_SESSION['rol']);
$rol = $tieneAcceso ? $_SESSION['rol'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Acceso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Verificar Acceso</h1>
        
        <div class="result <?php echo $tieneAcceso ? 'success' : 'error'; ?>">
            <?php if ($tieneAcceso): ?>
                <p>Acceso concedido como: <strong><?php echo htmlspecialchars($rol); ?></strong></p>
            <?php else: ?>
                <p>Acceso denegado</p>
            <?php endif; ?>
        </div>

        <div class="actions">
            <?php if (!$tieneAcceso): ?>
                <a href="iniciar_sesion.php" class="button">Login</a>
            <?php endif; ?>
            <a href="index.html" class="button secondary">Volver al Inicio</a>
        </div>

        <div class="note">
            <?php if ($tieneAcceso): ?>
                <p>Has iniciado sesión correctamente y tienes permisos de acceso.</p>
            <?php else: ?>
                <p>No has iniciado sesión. Haz clic en "Login" para establecer tu rol.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>