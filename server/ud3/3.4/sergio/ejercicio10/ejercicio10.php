<?php

//Inicio la sesion en php
session_start();

//Elimino todas las variables de sesion
session_unset(); 

//Destruyo la sesion completamente
session_destroy(); 

//Mnado al usuario a la pagina de verificacion de acceso
header("Location: verificar_acceso.php");
exit();
?>