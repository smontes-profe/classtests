<?php
// Config y verificación de parámetros
require_once __DIR__ . '/../1/config.php';

// ID del empleado a eliminar (desde querystring)
$id = $_GET['id'] ?? null;
if (!$id) die("Error: No se especificó el ID del empleado");

// Ejecutar borrado
try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar y ejecutar DELETE (parámetros enlazados)
    $sql = "DELETE FROM empleados WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Redirigir a la lista después de eliminar
    header("Location: lista.php");
    exit();
} catch (PDOException $e) {
    die("Error al eliminar empleado: " . $e->getMessage());
}
?>