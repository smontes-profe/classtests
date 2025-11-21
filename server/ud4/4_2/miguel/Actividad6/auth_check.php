<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?error=' . urlencode('Acceso denegado. Debe iniciar sesión.'));
    exit;
}