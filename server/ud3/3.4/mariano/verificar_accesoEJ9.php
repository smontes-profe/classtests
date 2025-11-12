<?php
// Iniciar o continuar la sesión
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar Acceso</title>
</head>
<body>
<?php
if (isset($_SESSION['rol'])) {
    echo "<h1>Acceso concedido como: " . htmlspecialchars($_SESSION['rol']) . "</h1>";
} else {
    echo "<h1>Acceso denegado</h1>";
    echo '<form action="iniciar_sesionEJ9.php" method="get">
            <button type="submit">Login</button>
          </form>';
}
?>
</body>
</html>



