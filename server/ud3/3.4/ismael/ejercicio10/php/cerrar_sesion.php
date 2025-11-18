<?php
// Destruye completamente la sesión y redirige a verificar_acceso.php

session_start();

// Vaciar todas las variables de sesión
$_SESSION = array();

// Si existe cookie de sesión, eliminarla estableciendo una fecha pasada
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// Destruir la sesión en el servidor
session_destroy();

// Redirigir de nuevo a verificar_acceso.php
header('Location: verificar_acceso.php');
exit();
