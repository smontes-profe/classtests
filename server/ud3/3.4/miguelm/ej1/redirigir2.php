<?php
// Obtener el valor de la variable 'centro' desde GET
$centro = $_GET['centro'] ?? '';

// Verificar si el centro es "Ilerna"
if ($centro === 'Ilerna') {
    // Redirigir a la página de Ilerna
    header('Location: https://www.ilerna.es');
    exit(); 
} else {
    // Mostrar mensaje para cualquier otro valor
    echo "Booooo! Fueraaaa!!!";
}
?>