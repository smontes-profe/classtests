<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Gestor de Usuarios Seguros</title>
<style>
body { font-family: Arial, sans-serif; margin: 20px; }
nav a { margin: 0 10px; text-decoration: none; }
table { border-collapse: collapse; margin-top: 20px; }
th, td { border: 1px solid #aaa; padding: 8px 12px; }
</style>
</head>
<body>
<nav>
    <a href="registro.php">Registro</a>
    <a href="login.php">Login</a>
    <?php if (!empty($_SESSION['usuario'])): ?>
        <a href="lista_usuarios.php">Lista de usuarios</a>
        <a href="logout.php">Logout (<?= escapar($_SESSION['usuario']['nombre_usuario']) ?>)</a>
    <?php endif; ?>
</nav>
<hr>
