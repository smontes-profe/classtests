<?php

if (isset($_GET['centro'])) {
    $valor = trim((string) $_GET['centro']);

    // Guardar cookie 'centro' que expira en 60 segundos (1 minuto)
    setcookie('centro', $valor, time() + 60, '/');

    // Redirigir a receptor.php (en la misma carpeta php/)
    header('Location: receptor.php');
    exit();
} else {
    // Si se accede sin parámetros, redirigir al formulario HTML
    header('Location: ../html/form.html');
    exit();
}
