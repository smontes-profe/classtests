<?php

//Verifico si la coockie centro existe
if (isset($_COOKIE['centro'])) {

    //Si existe muestra el valor
    echo "La cookie 'centro' contiene: " . $_COOKIE['centro'];
} else {

    //Si no existe te manda al formulario para crearla 
    header("Location: form.php");
    exit();
}
?>