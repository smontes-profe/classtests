<?php
session_start();

$_SESSION = [];

session_destroy();

header("Location: verificar_acceso.php");
exit;
?>