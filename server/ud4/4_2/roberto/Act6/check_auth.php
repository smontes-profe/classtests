<?php
// actividad6/check_auth.php

// Iniciar la sesión
session_start();

// 1. Comprobar si la variable de sesión 'user_id' NO está definida
if (!isset($_SESSION['user_id'])) {
    
    // 2. Si no existe, el usuario no está logueado
    // Redirigir al login
    header("Location: login.php");
    
    // 3. Detener el script
    exit;
}

// Si el script llega hasta aquí, significa que 'user_id' SÍ existe,
// por lo que el usuario está autenticado. El script que incluyó este archivo
// continuará ejecutándose.
?>