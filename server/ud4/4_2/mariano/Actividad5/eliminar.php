<?php
require_once 'config.php';

// Verificamos si llega el parámetro id
if (!isset($_GET['id'])) {
    die("ID no especificado.");
}

$id = $_GET['id'];

try {
    // DELETE preparado
    $stmt = $pdo->prepare("DELETE FROM empleados WHERE id = ?");
    $stmt->execute([$id]);

    // Redirigimos a la lista
    header("Location: lista.php");
    exit;
} catch (PDOException $e) {
    die("Error al eliminar: " . $e->getMessage());
}
?>
