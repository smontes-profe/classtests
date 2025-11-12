<?php
/**
 * Gestión de conexión a base de datos con PDO
 * 
 * Este archivo maneja la conexión a MySQL usando PDO con gestión
 * robusta de errores y buenas prácticas de seguridad.
 */

// Incluir archivo de configuración
require_once __DIR__ . '/config.php';

// Variable global para la conexión (evitar múltiples conexiones)
$pdo = null;

try {
    /**
     * Crear instancia PDO
     * 
     * PDO lanzará una excepción si la conexión falla debido a:
     * - Credenciales incorrectas
     * - Base de datos inexistente
     * - Servidor MySQL no disponible
     * - Problemas de red
     */
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS, DB_OPTIONS);
    
    // Mensaje de éxito (opcional, solo para desarrollo/debug)
    echo "✅ <strong>Conexión exitosa a la base de datos '{$pdo->query('SELECT DATABASE()')->fetchColumn()}'</strong><br>";
    echo "📊 Servidor MySQL: " . $pdo->getAttribute(PDO::ATTR_SERVER_VERSION) . "<br>";
    echo "🔌 Estado de conexión: Activa<br>";
    
} catch (PDOException $e) {
    /**
     * Manejo de errores de conexión
     * 
     * PDOException proporciona información detallada del error:
     * - $e->getMessage(): Descripción del error
     * - $e->getCode(): Código de error SQL
     * - $e->getFile() y $e->getLine(): Ubicación del error
     */
    
    // Log del error (en producción usar error_log())
    $errorMsg = sprintf(
        "[%s] Error de conexión PDO: %s (Código: %s) en %s:%d",
        date('Y-m-d H:i:s'),
        $e->getMessage(),
        $e->getCode(),
        $e->getFile(),
        $e->getLine()
    );
    
    // En desarrollo: mostrar error detallado
    echo "❌ <strong>Error al conectar con la base de datos</strong><br>";
    echo "📋 Detalles técnicos:<br>";
    echo "<pre style='background: #f8d7da; padding: 10px; border-left: 4px solid #dc3545;'>";
    echo htmlspecialchars($errorMsg);
    echo "</pre>";
    
    // En producción: registrar en log y mostrar mensaje genérico
    // error_log($errorMsg);
    // die("Error del sistema. Contacte al administrador.");
    
    // Detener ejecución
    exit(1);
    
} catch (Exception $e) {
    /**
     * Captura de otros errores inesperados
     * Es una buena práctica tener un catch genérico como fallback
     */
    echo "❌ <strong>Error inesperado:</strong> " . htmlspecialchars($e->getMessage());
    exit(1);
}

/**
 * Función helper para obtener la conexión (Patrón Singleton opcional)
 * 
 * @return PDO Instancia de la conexión
 */
function getConnection(): PDO {
    global $pdo;
    
    if ($pdo === null) {
        throw new RuntimeException("La conexión a la base de datos no está establecida");
    }
    
    return $pdo;
}

// El objeto $pdo está disponible para incluir en otros archivos