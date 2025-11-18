<?php

require_once 'config.php';
$id = $_GET['id'] ?? null;
if (!$id) die("ID no válido.");

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("DELETE FROM empleados WHERE id=:id");
    $stmt->execute([':id'=>$id]);
    header("Location: lista.php");
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

?>
