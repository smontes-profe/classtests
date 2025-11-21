<?php
/**
 * Cabecera HTML Global.
 *
 * Inicia el buffer de salida, carga funciones y arranca la sesión.
 * También muestra la navegación principal.
 */

// 1. Cargar el helper de funciones (para startSecureSession)
// Usamos '../..' para subir dos niveles (desde 'views/partials/' hasta la raíz)
require_once __DIR__ . '/../../includes/funciones.php';
require_once __DIR__ . '/../../includes/config.php'; // Para APP_NAME

// 2. Iniciar la sesión de forma segura
startSecureSession();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

    <header>
        <h1><?= APP_NAME ?></h1>
        <nav>
            <ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="dashboard.php">Dashboard (Usuarios)</a></li>
                    <li><a href="logout.php">Cerrar Sesión (<?= htmlspecialchars($_SESSION['user_email'] ?? '') ?>)</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Registro</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
    