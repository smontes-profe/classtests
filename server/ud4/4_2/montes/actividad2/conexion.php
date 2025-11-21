<?php
/**
 * Gestión de conexión a base de datos con PDO
 */

// Incluir archivo de configuración
require_once __DIR__ . '/config.php';

// Variable global para la conexión
$pdo = null;

try {
    /**
     * Crear instancia PDO
     */
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS, DB_OPTIONS);
    
    // (Opcional) Comentamos los 'echo' de éxito para 
    // no interferir con la salida de listar_empleados.php
    // echo "✅ Conexión exitosa...";
    
} catch (PDOException $e) {
    /**
     * Manejo de errores de conexión
     */
    
    $errorMsg = sprintf(
        "[%s] Error de conexión PDO: %s (Código: %s)",
        date('Y-m-d H:i:s'),
        $e->getMessage(),
        $e->getCode()
    );
    
    // Mostrar error detallado
    echo "❌ <strong>Error al conectar con la base de datos</strong><br>";
    echo "<pre style='background: #f8d7da; padding: 10px; border-left: 4px solid #dc3545;'>";
    echo htmlspecialchars($errorMsg);
    echo "</pre>";
    
    // Detener ejecución
    exit(1);
    
} catch (Exception $e) {
    echo "❌ <strong>Error inesperado:</strong> " . htmlspecialchars($e->getMessage());
    exit(1);
}

/**
 * Función helper para obtener la conexión
 * @return PDO Instancia de la conexión
 */
function getConnection(): PDO {
    global $pdo;
    
    if ($pdo === null) {
        throw new RuntimeException("La conexión a la base de datos no está establecida");
    }
    
    return $pdo;
}