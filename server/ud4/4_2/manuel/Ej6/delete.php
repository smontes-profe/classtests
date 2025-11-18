<?php
require_once 'conexion.php';
$pdo = getPDO();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Método no válido");
}

$id = $_POST['id'] ?? null;
if (!$id || !is_numeric($id)) {
    die("ID inválido.");
}

try {
    $stmt = $pdo->prepare("DELETE FROM empleados WHERE id = :id");
    $stmt->execute([':id' => $id]);

    header("Location: lista.php");
    exit;
} catch (PDOException $e) {
    die("Error al borrar: " . htmlspecialchars($e->getMessage()));
}