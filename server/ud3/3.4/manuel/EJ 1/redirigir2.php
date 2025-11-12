<?php
if (isset($_GET['centro'])) {
    $centro = $_GET['centro'];

    if ($centro === "Ilerna") {
        header("Location: https://www.ilerna.es/fp-sevilla/");
        exit(); 
    } else {
        echo "Booooo! Fueraaaa!!!";
    }
} else {
    echo "Parámetro sin especificar.";
}
?>