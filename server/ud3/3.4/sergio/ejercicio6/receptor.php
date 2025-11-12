<?php

//Verifico si la coockie centro existe
if (isset($_COOKIE['centro'])) {

    //Muestro el valor de la coockie
    echo "La cookie 'centro' contiene: " . $_COOKIE['centro'];

    //Borro la coockie con un tiempo de expiracion
    setcookie("centro", "", time() - 3600);
    echo "<br>Cookie borrada.";
} else {

    //Si la coockie no existe se manda al formulario para crearla
    header("Location: form.php");
    exit();
}
?>