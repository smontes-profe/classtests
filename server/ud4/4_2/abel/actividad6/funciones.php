<?php

session_start();

// Redirige si el usuario NO ha iniciado sesión
function verificarSesion() {
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
        exit;
    }
}

// Escapar salidas HTML
function escapar($cadena) {
    return htmlspecialchars($cadena ?? '', ENT_QUOTES, 'UTF-8');
}

?>
