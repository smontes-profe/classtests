<?php
// Crear cookie que expira en 30 segundos
setcookie("centro", "Ilerna", time() + 30);

echo "<h2>Cookie creada</h2>";
echo "Cookie 'centro' creada con valor 'Ilerna' - Expira en 30 segundos<br><br>";

echo "<h2>Contenido de \$_COOKIE:</h2>";
var_dump($_COOKIE);

echo "<br><br><h2>Valor de la cookie 'centro':</h2>";
if(isset($_COOKIE['centro'])) {
    echo "El valor de la cookie 'centro' es: " . $_COOKIE['centro'];
} else {
    echo "La cookie 'centro' aún no está disponible. Recarga la página para verla.";
}
?>