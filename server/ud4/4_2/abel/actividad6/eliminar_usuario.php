<?php
require_once 'config.php';
require_once 'funciones.php';
verificarSesion();

$id = $_GET['id'] ?? null;
if (!$id) die("ID no válido.");

$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $id]);

header("Location: lista_usuarios.php");
exit;
