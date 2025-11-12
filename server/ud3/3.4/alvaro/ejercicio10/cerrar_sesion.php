<?php
session_start();
session_unset();
session_destroy();
header("Location: verificar_acceso.php");
exit();
?>
