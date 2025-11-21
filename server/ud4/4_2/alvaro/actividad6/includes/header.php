<?php

session_start();

// Mostramos errores para ayudarnos a depurar
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluimos la configuración de la BBDD
require_once 'config.php';

// Preparamos variables para los mensajes (las usarán las páginas)
$mensaje = '';
$error = '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo_pagina ?? 'Gestor de Usuarios' ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <ul>
            <?php // --- Menú Dinámico --- 
            ?>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <li><a href="dashboard.php">Listar Usuarios</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="registro.php">Registro</a></li>
            <?php endif; // Fin del if 
            ?>
        </ul>
    </nav>
    <div class="container">