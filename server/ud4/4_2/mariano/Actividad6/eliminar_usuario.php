<?php
require_once 'funciones.php';
usuarioAutenticado();

if (!isset($_GET['id'])) die("Falta ID de usuario");
$id = (int)$_GET['id'];

try {
    $pdo = getPDO();
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: lista_usuarios.php");
    exit;
} catch (PDOException $e) {
    die("Error BD: " . $e->getMessage());
}
?>
