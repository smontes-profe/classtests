<?php
require_once 'conexion.php';

try {
    $pdo = getPDO();
    echo "<p>Conexión establecida: <strong>" . htmlspecialchars(DB_NAME) . "</strong></p>";
} catch (Exception $e) {
    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}