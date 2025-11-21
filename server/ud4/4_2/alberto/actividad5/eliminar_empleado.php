<?php
require_once __DIR__ . '/../actividad1/conexion.php';

$id = $_GET['id'] ?? null;
if(!$id){ exit("falta id"); }

$pdo->prepare("DELETE FROM empleados WHERE id=?")->execute([$id]);

header("Location: lista.php");
exit;
?>