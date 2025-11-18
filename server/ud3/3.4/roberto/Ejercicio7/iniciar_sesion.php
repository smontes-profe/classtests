<?php
// iniciar_sesion.php

// Iniciar la sesión
session_start();

// Mostrar el ID de la sesión actual
echo "<h2>ID de la sesión actual:</h2>";
echo session_id();

// Opcional: para ver todas las variables de sesión (si hubiera)
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>
