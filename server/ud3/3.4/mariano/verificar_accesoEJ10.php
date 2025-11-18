<?php

session_start();

if (isset($_SESSION['rol'])) {
    echo "<h2>Acceso concedido como: " . htmlspecialchars($_SESSION['rol']) . "</h2>";


    echo '<form action="cerrar_sesionEJ10.php" method="post">
            <button type="submit">Destruir sesión</button>
          </form>';

} else {
    echo "<h2>Acceso denegado</h2>";
    echo '<form action="iniciar_sesionEJ10.php" method="get">
            <button type="submit">Login</button>
          </form>';
}
?>

