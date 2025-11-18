<?php

// Si la cookie existe, mostrarla
if (isset($_COOKIE['centro'])) {
    $centro = $_COOKIE['centro'];
    echo "<h2>Cookie encontrada:</h2>";
    echo "<p>Centro: <strong>$centro</strong></p>";
    echo "<p>Recarga esta página después de 1 minuto para ver cómo expira la cookie.</p>";
} else {
    // Si no existe la cookie, redirigir al formulario
    header('Location: form.php');
    exit;
}
?>
