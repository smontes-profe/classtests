<?php
session_start();
$_SESSION['rol'] = 'Administrador';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8 - Sesión con valor</title>
</head>
<body>
<h1>Ejercicio 8 - Guardar valor en sesión</h1>
<p>ID de sesión: <?php echo session_id(); ?></p>
<p>Rol guardado en sesión: <?php echo $_SESSION['rol']; ?></p>
<a href="../index.html">Volver al índice</a>
</body>
</html>
