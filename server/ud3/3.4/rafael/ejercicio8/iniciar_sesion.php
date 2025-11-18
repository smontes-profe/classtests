<?php
session_start();
$_SESSION['rol'] = 'Administrador';
echo "ID de la sesión: " . session_id();
echo "<br> Rol de usuario: " . $_SESSION['rol'];
?>