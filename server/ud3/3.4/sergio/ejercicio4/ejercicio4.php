<?php

//Creo una coockie llamada centro con el valor ilerna que expira en 30 segundos
setcookie("centro", "Ilerna", time() + 30);

//Muestra las coockies disponibles en el navegador
echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";

// Verifico si centro esta disponible y muestro su valor
if (isset($_COOKIE['centro'])) {
    echo "Valor de la cookie 'centro': " . $_COOKIE['centro'];
} else {

    //Si no esta disponible muestra el mensaje
    echo "La cookie 'centro' no está disponible aún o ha expirado.";
}
?>