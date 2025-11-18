<?php
// Crear la cookie "centro" con valor "Ilerna" que expira en 30 segundos
setcookie("centro", "Ilerna", time() + 30);

// Mostrar el contenido de $_COOKIE
echo "<h1>Lectura de Cookie</h1>";
echo "<h3>Contenido de \$_COOKIE:</h3>";
var_dump($_COOKIE);

// Comprobamos si la cookie "centro" existe antes de mostrarla
if (isset($_COOKIE['centro'])) {
    echo "<p><strong>Valor de la cookie 'centro':</strong> " . $_COOKIE['centro'] . "</p>";
} else {
    echo "<p><em>La cookie 'centro' aún no está disponible o ha expirado.</em></p>";
}
?>
