<?php
require_once __DIR__ . '/../actividad1/conexion.php';

$id = $_GET['id'] ?? null;
if(!$id) die("sin id");

$st = $pdo->prepare("DELETE FROM usuarios WHERE id=?");
$st->execute([$id]);

header("Location: usuarios_lista.php");
exit;
