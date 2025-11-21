<?php
require_once 'config.php';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? null;

try {
    $stmt = $pdo->prepare("DELETE FROM empleados WHERE id = :id");
    $stmt->execute([':id' => $id]);
    header("Location: lista.php");
    exit;
} catch (PDOException $e) {
    echo " Error al eliminar: " . $e->getMessage();
}
?>