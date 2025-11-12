<?php
/**
 * Controlador del Dashboard (Área Privada).
 *
 * 1. Protege la página contra acceso no autenticado.
 * 2. Obtiene la lista de usuarios de la BBDD.
 * 3. Carga la vista para mostrar la lista.
 */

// 1. Cargar dependencias
require_once __DIR__ . '/includes/db.php';
// header.php carga 'funciones.php' y 'startSecureSession()'
require_once __DIR__ . '/views/partials/header.php';

// 2. --- ¡SEGURIDAD! (REQUISITO) ---
// Usamos la función de 'funciones.php' para proteger esta página.
// Si el usuario no está logueado, esta función lo redirige
// a 'login.php' y detiene la ejecución del script.
requireAuth();

// 3. Lógica de la página (solo se ejecuta si requireAuth() pasa)
$usuarios = []; // Array para guardar los usuarios
$error_db = '';   // Variable para errores

try {
    // --- Consulta Preparada (REQUISITO) ---
    // Seleccionamos solo los datos que necesitamos (¡NUNCA la contraseña!)
    $sql = "SELECT id, nombre, email FROM usuarios ORDER BY nombre ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    // Obtenemos todos los resultados
    $usuarios = $stmt->fetchAll();

} catch (PDOException $e) {
    // Guardamos un error si la consulta falla
    $error_db = "Error al obtener la lista de usuarios: " . htmlspecialchars($e->getMessage());
}

// 4. Cargar la vista
// La vista 'user_list.php' tendrá acceso a las variables
// $usuarios y $error_db que hemos creado aquí.
require __DIR__ . '/views/user_list.php';

// 5. Cargar el pie de página
require __DIR__ . '/views/partials/footer.php';
?>