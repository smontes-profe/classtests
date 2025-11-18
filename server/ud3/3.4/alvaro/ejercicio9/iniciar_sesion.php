<?php
session_start();
$_SESSION['rol'] = 'Administrador';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9 - Login</title>
</head>
<body>
<h1>Ejercicio 9 - Login</h1>
<p>Sesión iniciada como: <?php echo $_SESSION['rol']; ?></p>
<a href="verificar_acceso.php">Ir a verificar acceso</a>
<a href="../index.html">Volver al índice</a>
</body>
</html>
