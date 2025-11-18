<?php
// 1. Iniciamos la sesión
// (Es necesario iniciarla para poder acceder a ella y destruirla)
session_start();

// 2. Vaciamos el array $_SESSION
// Esto borra todos los datos guardados (como 'usuario_id', 'usuario_nombre')
$_SESSION = array();

// 3. (Opcional pero recomendado) Borramos la cookie de sesión del navegador
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), // Coge el nombre de la cookie (ej: PHPSESSID)
        '', // La deja vacía
        time() - 42000, // La caduca en el pasado para que el navegador la borre
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// 4. Destruimos la sesión en el servidor
session_destroy();

// 5. Redirigimos al usuario a la página de login
// El "?logout=1" es para poder mostrar un mensaje de "Has salido"
header("Location: login.php?logout=1");
exit; // Paramos el script
