<?php
//EJERCICIO8
session_start();

$_SESSION['rol'] = "Administrador";

echo "<h1>ID de la sesión actual:</h1>";
echo "<p>" . session_id() . "</p>";

echo "<h2>Valor almacenado en la sesión:</h2>";
echo "<p>Rol: " . $_SESSION['rol'] . "</p>";
?>