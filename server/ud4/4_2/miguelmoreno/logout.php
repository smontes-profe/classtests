
<?php

require_once __DIR__ . '/../sesion_usuarios.php';
$_SESSION = [];
session_destroy();
header('Location: /usuarios/login.php');
exit;


