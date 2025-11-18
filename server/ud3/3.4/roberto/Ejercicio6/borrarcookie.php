<?php
// Comprobamos si existe la cookie "centro"
if (isset($_COOKIE['centro'])) {
    $valor = $_COOKIE['centro'];
    echo "<h1>Cookie encontrada </h1>";
    echo "<p><strong>Valor de la cookie 'centro':</strong> $valor</p>";
    echo "<p>La cookie será eliminada ahora mismo.</p>";

    // Borrar la cookie estableciendo una fecha de expiración pasada
    setcookie("centro", "", time() - 3600);

    echo "<p><em>Cookie borrada correctamente </em></p>";
} else {
    // Si la cookie no existe, redirigimos al formulario
    header("Location: form.php");
    exit();
}
?>
