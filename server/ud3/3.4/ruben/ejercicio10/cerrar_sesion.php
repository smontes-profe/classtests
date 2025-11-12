<?php
session_start();

// Eliminar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir a verificar_acceso.php
header("Location: verificar_acceso.php");
exit();
?>