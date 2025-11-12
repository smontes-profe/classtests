<?php

if (isset($_COOKIE['centro'])) {
    $centro = $_COOKIE['centro'];

    echo "<h2>Cookie encontrada:</h2>";
    echo "<p>Centro: <strong>$centro</strong></p>";
    echo "<p>La cookie será eliminada ahora mismo.</p>";

    // Borrar la cookie: poner fecha de expiración pasada
    setcookie('centro', '', time() - 3600, '/');

    echo "<p>Cookie 'centro' borrada. Si recargas esta página, ya no existirá y te redirigirá al formulario.</p>";
} else {
    // Si no existe la cookie, redirigir al formulario
    header('Location: form.php');
    exit;
}
?>
