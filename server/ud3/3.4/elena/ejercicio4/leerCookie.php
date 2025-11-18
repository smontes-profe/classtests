
<?php
setcookie("centro", "Ilerna", time() + 30);

echo "<pre>";
var_dump($_COOKIE); // Muestra las cookies
echo "</pre>";

if (isset($_COOKIE['centro'])) {
    echo "Valor de la cookie: " . $_COOKIE['centro'];
} else {
    echo "La cookie no está disponible";
}
?>


