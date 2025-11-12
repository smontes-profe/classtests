<?php
// Si recibe 'centro' por GET guarda la cookie 1 minuto y redirige a receptor.php
// Si no recibe datos, redirige al formulario HTML.

//TODO Evitar cualquier salida antes de setcookie() y header()
if (isset($_GET['centro'])) {
    $valor = trim((string) $_GET['centro']);

    // Guardar cookie 'centro' que expira en 60 segundos
    // Path '/' para que esté disponible en todo el sitio
    setcookie('centro', $valor, time() + 60, '/');

    // Redirigir a receptor.php (archivo en la misma carpeta php/)
    header('Location: receptor.php');
    exit();
} else {
    // Si se accede sin GET, redirigimos al formulario HTML
    header('Location: ../html/form.html');
    exit();
}
