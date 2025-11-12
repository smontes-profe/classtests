<?php
session_start();
$_SESSION['rol'] = "Administrador";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login Exitoso</h1>
    <p>Rol asignado: <?php echo $_SESSION['rol']; ?></p>
    <a href="verificar_acceso.php">Verificar acceso</a>
</body>
</html>