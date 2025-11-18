<?php
// verificar_acceso.php

// Iniciar la sesión
session_start();

// Comprobar si existe la variable de sesión 'rol'
if (isset($_SESSION['rol'])) {
    echo "<h2>Acceso concedido como: " . $_SESSION['rol'] . "</h2>";

    // Botón para destruir la sesión
    echo '<form action="cerrar_sesion.php" method="post">';
    echo '<button type="submit">Destruir sesión</button>';
    echo '</form>';

} else {
    echo "<h2>Acceso denegado</h2>";

    // Botón para volver a iniciar sesión
    echo '<form action="iniciar_sesion.php" method="get">';
    echo '<button type="submit">Login</button>';
    echo '</form>';
}
?>
