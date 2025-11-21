<?php
// actividad6/logout.php

// 1. Iniciar la sesión para poder acceder a ella
session_start();

// 2. Vaciar el array de sesión
$_SESSION = [];

// 3. Destruir la sesión (borra el archivo de sesión del servidor)
session_destroy();

// 4. (Opcional) Borrar la cookie de sesión del navegador
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 5. Redirigir al login
header("Location: login.php");
exit;
?>