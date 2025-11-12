<?php
session_start();
$_SESSION['rol'] = "Administrador";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión PHP</title>
</head>
<body>
    <h1>Guardar Valor en Sesión</h1>
    <p><strong>Rol:</strong> <?php echo $_SESSION['rol']; ?></p>
    <p>ID de sesión: <?php echo session_id(); ?></p>
    
    <form action="verificar_acceso.php" method="post">
        <button type="submit">Verificar Acceso</button>
    </form>
</body>
</html>


<!-- verificar_acceso.php -->
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
        
        <form action="cerrar_sesion.php" method="post">
            <button type="submit">Destruir sesión</button>
        </form>
    <?php else: ?>
        <h1>✗ Acceso denegado</h1>
        <form action="iniciar_sesion.php" method="post">
            <button type="submit">Login</button>
        </form>
    <?php endif; ?>
</body>
</html>