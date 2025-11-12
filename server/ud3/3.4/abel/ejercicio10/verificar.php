<?php
session_start();

echo "<h2>Verificación de Acceso</h2>";

if (isset($_SESSION['rol'])) {
    echo "<p>Acceso: " . $_SESSION['rol'] . "</p>";
    
    echo '<form action="cerrar_sesion.php" method="post">
            <button type="submit">Destruir sesión</button>
          </form>';
} else {
    echo "<p style='color:red;'>Acceso denegado</p>";
    echo '<form action="iniciar_sesion.php" method="post">
            <button type="submit">Login</button>
          </form>';
}
?>