<?php
// Ejercicio 1: Redirección HTTP 2

if (isset($_GET['centro'])) {
    if ($_GET['centro'] === 'Ilerna') {
        header('Location: https://www.ilerna.es');
        exit();
    } else {
        echo "Booooo! Fueraaaa!!!";
    }
}
?>