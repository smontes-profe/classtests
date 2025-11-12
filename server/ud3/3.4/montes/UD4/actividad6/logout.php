<?php
/**
 * Script de Cierre de Sesión (Logout).
 *
 * Destruye la sesión activa y redirige al usuario
 * a la página de login.
 */

// 1. Cargar el helper de funciones
// Lo necesitamos SOLO para llamar a 'startSecureSession()'
// Es crucial iniciar la sesión para poder destruirla.
require_once __DIR__ . '/includes/funciones.php';

// 2. Iniciar la sesión de forma segura
startSecureSession();

// 3. Vaciar todas las variables de sesión
$_SESSION = [];

// 4. Destruir la cookie de sesión (si existe)
// Esto ayuda a forzar el borrado en el lado del cliente.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 5. Finalmente, destruir la sesión en el servidor
session_destroy();

// 6. Redirigir al login
header('Location: login.php');
exit; // Asegurarse de que el script se detiene aquí

?>