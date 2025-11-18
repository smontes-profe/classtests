<?php

session_start();


$_SESSION['rol'] = "Administrador";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión simulado</title>
</head>
<body>
    <h1>ID de la sesión actual:</h1>
    <p><?php echo session_id(); ?></p>

    <h2>Valor almacenado en la sesión:</h2>
    <p>Rol: <?php echo $_SESSION['rol']; ?></p>

    <form action="verificar_accesoEJ9.php" method="get">
        <button type="submit">Verificar acceso</button>
    </form>
</body>
</html>