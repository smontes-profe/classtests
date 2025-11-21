<?php
/**
 * Archivo de Funciones Auxiliares (Helpers).
 *
 * Contiene funciones reutilizables para toda la aplicación,
 * como la gestión de sesiones y la validación.
 */

/**
 * Inicia la sesión de forma segura.
 *
 * Comprueba si ya hay una sesión activa antes de iniciarla
 * para evitar advertencias.
 * Se debe llamar al principio de CADA script que necesite sesiones.
 */
function startSecureSession(): void
{
    // Solo inicia la sesión si no hay una ya activa
    if (session_status() === PHP_SESSION_NONE) {
        // Podríamos añadir más configuraciones de seguridad aquí
        // (como httpOnly cookies), pero por ahora, esto es lo esencial.
        session_start();
    }
}

/**
 * Protege una página y exige autenticación.
 *
 * Comprueba si el ID de usuario existe en la sesión.
 * Si no existe, redirige al usuario a 'login.php' y detiene
 * la ejecución del script actual.
 */
function requireAuth(): void
{
    // Esta función ASUME que startSecureSession() ya ha sido llamada.
    
    // Si la variable de sesión 'user_id' no está definida...
    if (!isset($_SESSION['user_id'])) {
        // Redirige al login
        header('Location: login.php');
        // Detiene el script para que no se cargue nada más de la pág. protegida
        exit;
    }
}

/**
 * Limpia y sanea una entrada de formulario para prevenir XSS.
 *
 * @param string $data La entrada del usuario (ej: $_POST['email']).
 * @return string La entrada saneada.
 */
function sanitizeInput(string $data): string
{
    // 1. Quita espacios en blanco al inicio y al final
    $data = trim($data);
    // 2. Quita barras invertidas (\) que podrían usarse en inyecciones
    $data = stripslashes($data);
    // 3. Convierte caracteres especiales a entidades HTML (previene XSS)
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    
    return $data;
}

?>