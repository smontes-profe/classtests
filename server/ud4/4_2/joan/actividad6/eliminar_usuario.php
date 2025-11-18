<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

require_once 'config.php';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $id]);

header("Location: panel.php");
exit;
?>