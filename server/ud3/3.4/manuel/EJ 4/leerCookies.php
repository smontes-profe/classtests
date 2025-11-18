<?php
setcookie("centro", "Ilerna", time() + 30);

echo "<h2>Cookie 'centro' creada (expira en 30 segundos)</h2>";

echo "<h3>Contenido de \$_COOKIE:</h3>";
var_dump($_COOKIE);

if (isset($_COOKIE['centro'])) {
    echo "<p>Valor de la cookie 'centro': " . $_COOKIE['centro'] . "</p>";
} else {
    echo "<p>La cookie 'centro' no está disponible.</p>";
}
?>