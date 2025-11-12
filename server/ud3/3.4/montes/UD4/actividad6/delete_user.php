<?php
/**
 * Script de Eliminación de Usuario (Solo Procesamiento).
 *
 * 1. Protegido por sesión (requireAuth).
 * 2. Valida el ID recibido por GET.
 * 3. Previene que un usuario se elimine a sí mismo.
 * 4. Ejecuta un DELETE con consulta preparada.
 * 5. Redirige al dashboard.
 */

// 1. Cargar dependencias
// NO cargamos header.php porque esta página no muestra HTML.
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/funciones.php';

// 2. Iniciar sesión y Proteger la página
startSecureSession();
requireAuth(); // ¡REQUISITO DE SEGURIDAD!

// 3. Validar el ID de entrada
$id_to_delete = $_GET['id'] ?? null;

// Usamos filter_var para asegurar que el ID es un entero
if (!$id_to_delete || !filter_var($id_to_delete, FILTER_VALIDATE_INT)) {
    // Si no hay ID o no es un entero válido, redirigimos
    header('Location: dashboard.php?status=invalid_id');
    exit;
}
$id_to_delete = (int) $id_to_delete; // Convertir a entero

// 4. Prevenir la auto-eliminación (Buena Práctica Senior)
$logged_in_user_id = (int) $_SESSION['user_id'];

if ($id_to_delete === $logged_in_user_id) {
    // No puedes eliminarte a ti mismo
    header('Location: dashboard.php?status=self_delete_error');
    exit;
}

// 5. Proceder con la eliminación
try {
    // --- Consulta Preparada (REQUISITO) ---
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $pdo -> prepare($sql);
    $stmt->execute([$id_to_delete]);

    // 6. Redirigir con mensaje de éxito o error
    if ($stmt->rowCount() > 0) {
        // Se eliminó al menos una fila (éxito)
        header('Location: dashboard.php?status=deleted');
    } else {
        // No se eliminó nada (el ID no existía)
        header('Location: dashboard.php?status=not_found');
    }

} catch (PDOException $e) {
    // Error de base de datos
    error_log("Error al eliminar usuario: " . $e->getMessage()); // Log para el admin
    header('Location: dashboard.php?status=db_error');
}

exit; // Asegurarse de que el script termina aquí

?>