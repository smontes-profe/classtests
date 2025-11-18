<?php
// Crear la cookie 'centro' con valor 'Ilerna' que expire en 30 segundos
setcookie("centro", "Ilerna", time() + 30);

// Mensaje de confirmación
echo "Cookie 'centro' creada con valor 'Ilerna' y expiración en 30 segundos.";

// Mostrar valor actual de la cookie si ya existe
if(isset($_COOKIE['centro'])){
    echo "<br>Valor actual de la cookie: " . $_COOKIE['centro'];
} else {
    echo "<br>La cookie aún no está disponible o ha expirado.";
}
?>
