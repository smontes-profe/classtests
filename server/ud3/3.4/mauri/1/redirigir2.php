<?php
// Obtener el valor del parámetro centro
$centro = isset($_GET['centro']) ? $_GET['centro'] : '';

// Comprobar si el centro es Ilerna
if ($centro === 'Ilerna') {
    header('Location: https://www.ilerna.es/');
    exit();
} else {
    echo "Booooo! Fueraaaa!!!";
}
?>