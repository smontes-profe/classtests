
<?php
session_start(); // Para iniciar la sesión
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión
header("Location: verificar.php");
exit;
?>


