<?php
// 1. Iniciar la sesión para poder destruirla
session_start();

// 2. Eliminar todas las variables del array $_SESSION
$_SESSION = array();

// 3. Destruir la cookie de sesión (necesario para la destrucción completa)
// Esto borra la cookie PHPSESSID del navegador
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Finalmente, destruir los datos de sesión en el servidor
session_destroy();

// 5. Redirigir al script de verificación de acceso para comprobar que la sesión ha desaparecido
header("Location: verificarAcceso.php?logout=success");
exit();
?>