<?php
session_start();
$_SESSION['rol'] = "Administrador";

echo "<h2>Iniciar sesión</h2>";
echo "<p>ID de sesióN: " . session_id() . "</p>";
echo "<p>Rol: " . $_SESSION['rol'] . "</p>";

echo '<form action="verificar.php" method="post">
        <button type="submit">Verificar Acceso</button>
      </form>';

?>