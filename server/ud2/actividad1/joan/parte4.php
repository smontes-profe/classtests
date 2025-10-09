<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $edad = 45;
    $anyoActual = date("Y"); 

    $edadFutura = $edad + 10;
    $anyoFuturo = $anyoActual + 10;

  
    $edadPasada = $edad - 10;
    $anyoPasado = $anyoActual - 10;

    
    $anioJubilacion = $anyoActual + (67 - $edad);


    echo "Información sobre la edad<br><br>";
    echo "Edad actual: $edad años<br>";
    echo "Dentro de 10 años: $edadFutura años (año $anyoFuturo)<br>";
    echo "Hace 10 años: $edadPasada años (año $anyoPasado)<br>";
    echo "Año de jubilación (67 años): $anioJubilacion<br>";
?>
</body>
</html>