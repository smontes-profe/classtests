<!-- verificar_acceso.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar acceso</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['rol'])) {
        echo "<h2>Acceso concedido como: " . $_SESSION['rol'] . "</h2>";
        echo '<form action="cerrar_sesion.php" method="post">
                <button type="submit">Destruir sesión</button>
              </form>';
    } else {
        echo "<h2>Acceso denegado</h2>";
        echo '<form action="iniciar_sesion.php" method="get">
                <button type="submit">Login</button>
              </form>';
    }
    ?>
</body>
</html>
