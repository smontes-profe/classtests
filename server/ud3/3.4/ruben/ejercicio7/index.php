<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Sesión Iniciada</h1>
    <p>ID de sesión: <strong><?php echo session_id(); ?></strong></p>
    <p>Refresca varias veces y verás que el ID se mantiene igual</p>
    <button onclick="location.reload()">Recargar</button>
</body>
</html>