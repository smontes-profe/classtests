<?php

//Inicia una sesion en php
session_start();

//Guardo un valor en la sesion bajo la clave rol 
$_SESSION['rol'] = "Administrador";

//Muestra el ID y el rol guardado
echo "ID de sesión actual: " . session_id() . "<br>";
echo "Rol guardado en sesión: " . $_SESSION['rol'];
?>