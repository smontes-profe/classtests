<?php
// Comprobamos si se ha recibido la variable "centro" por GET
if (isset($_GET['centro'])) {
    $centro = $_GET['centro'];

    // Si el valor es "Ilerna", redirigimos a la página oficial de Ilerna
    if ($centro === "Ilerna") {
        header("Location: https://www.ilerna.es");
        exit(); // Detenemos la ejecución del script después de redirigir
    } else {
        // Si el valor no es "Ilerna"
        echo "Booooo! Fueraaaa!!!";
    }
} else {
    // Si no se ha pasado la variable por GET
    echo "No se ha especificado ningún centro.";
}
?>
