
// Actividad 1
<?php
require_once __DIR__ . '/config.php';

try {
    $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false, 
    ]);

    echo "<p>Conexión correcta <strong>{$DB_NAME}</strong>.</p>";
} catch (PDOException $e) {
    http_response_code(500);
    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>


