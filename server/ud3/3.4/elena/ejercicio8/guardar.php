
<?php
session_start();

$_SESSION['rol'] = "Administrador"; // Guardamos dato

echo "ID de sesión: " . session_id() . "<br>";
echo "Rol guardado en sesión: " . $_SESSION['rol'];
?>


