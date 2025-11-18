<?php
//Inicio la sesion para acceder a la base de datos
session_start();
//Limpio las variables de sesion
session_unset();
//Destruyo la sesion
session_destroy();
//Reedirijo al usuario a la pagina de login
header('Location: login.php');
exit;
