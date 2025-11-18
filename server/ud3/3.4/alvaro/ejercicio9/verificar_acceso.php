<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9/10 - Verificar Acceso</title>
</head>
<body>
<h1>Ejercicio 9/10 - Verificar Acceso</h1>
<?php
if (isset($_SESSION['rol'])) {
    echo "Acceso concedido como: " . $_SESSION['rol'];
    echo '<br><br><a href="cerrar_sesion.php">Destruir sesión</a>';
} else {
    echo "Acceso denegado.<br>";
    echo '<a href="iniciar_sesion.php">Login</a>';
}
?>
<br><br>
<a href="../index.html">Volver al índice</a>
</body>
</html>
