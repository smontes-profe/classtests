<?php

//Inicio una sesion en php
session_start();

//Guardo un valor en la sesion bajo la clave rol
$_SESSION['rol'] = "Administrador";

//Muestro el mensaje indicando el rol guardado
echo "<h3>Sesión iniciada con rol: " . $_SESSION['rol'] . "</h3>";

//Proporciono un enlace a otra pagina para que se pueda verificar el acceso 
echo '<a href="verificar_acceso.php">Verificar acceso</a>';
?>