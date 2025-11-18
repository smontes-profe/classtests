
<?php

if (isset($_GET['centro'])) {
    $centro = $_GET['centro'];

    if ($centro === 'Ilerna') { // Si escribe Ilerna
        header("Location: https://www.ilerna.es/");
        exit;
     } else { // Si escribe otra cosa
        echo "Booooo! Fueraaaa!!!";
     }
} 
?>


