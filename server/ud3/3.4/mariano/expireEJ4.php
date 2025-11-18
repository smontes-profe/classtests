<?php
setcookie("centro", "Ilerna", time() + 30);

echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";

if (isset($_COOKIE['centro'])) {
    echo "Valor de la cookie 'centro': " . $_COOKIE['centro'];
} else {
    echo "La cookie 'centro' aún no está disponible en esta petición.";
}
?>
