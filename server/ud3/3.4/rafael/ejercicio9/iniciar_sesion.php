<?php
session_start();
$_SESSION['rol'] = 'Administrador';
echo "ID de la sesión: " . session_id();
echo "<br> Rol de usuario: " . $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <br><br>
    <form action="verificar_acceso.php" method="GET">
        <button type="submit">Ir a verificar acceso</button>
    </form>
</body>
</html>