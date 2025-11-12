<?php
// iniciar_sesion.php

// Iniciar la sesión
session_start();

// Guardar un valor en la sesión
$_SESSION['rol'] = "Administrador";

// Mostrar el ID de la sesión actual
echo "<h2>ID de la sesión actual:</h2>";
echo session_id();

// Mostrar el contenido de la sesión
echo "<h2>Contenido de la sesión:</h2>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// Botón para verificar acceso
echo '<form action="verificar_acceso.php" method="get">';
echo '<button type="submit">Verificar acceso</button>';
echo '</form>';
?>
