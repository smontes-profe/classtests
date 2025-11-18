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