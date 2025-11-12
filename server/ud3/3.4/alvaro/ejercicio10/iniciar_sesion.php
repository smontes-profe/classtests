<?php
session_start();
$_SESSION['rol'] = 'Administrador';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 10 - Iniciar Sesión</title>
</head>
<body>
<h1>Ejercicio 10 - Iniciar Sesión</h1>
<p>Sesión iniciada como: <?php echo $_SESSION['rol']; ?></p>
<a href="verificar_acceso.php">Ir a verificar acceso</a>
<br><br>
<a href="../index.html">Volver al índice</a>
</body>
</html>
