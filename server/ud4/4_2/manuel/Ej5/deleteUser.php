<?php
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }
require_once 'conexion.php';
$pdo = getPDO();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') die("Método no permitido.");
$id = $_POST['id'] ?? null;
if (!$id || !is_numeric($id)) die("ID inválido.");

try {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->execute([':id' => $id]);
    header("Location: usuarios.php");
    exit;
} catch (PDOException $e) {
    die("Error: " . htmlspecialchars($e->getMessage()));
}