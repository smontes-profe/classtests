<?php
session_start();
session_destroy();
header("Location: verificar_acceso.php");
exit;
?>
