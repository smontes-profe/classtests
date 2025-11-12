<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar Acceso</title>
</head>
<body>
    <?php if (isset($_SESSION['rol'])): ?>
        <h1>✓ Acceso concedido</h1>
        <p>Acceso concedido como: <?php echo $_SESSION['rol']; ?></p>
    <?php else: ?>
        <h1>✗ Acceso denegado</h1>
        <form action="iniciar_sesion.php" method="post">
            <button type="submit">Login</button>
        </form>
    <?php endif; ?>
</body>
</html>