<?php

//Verificamos si se ha recibido centro por get
if (isset($_GET['centro'])) {
    $centro = $_GET['centro'];

    //  Si el valor es Ilerna te manda a su web
    if ($centro === "Ilerna") {
        header("Location: https://www.ilerna.es");
        exit();
    } else {

        //Si el valor es distinto te muestra el mensaje
        echo "Booooo! Fueraaaa!!!";
    }
} else {

    //Si no se envia centro te indica que falta
    echo "Parámetro 'centro' no especificado.";
}
?>