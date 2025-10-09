<?php

$frase1 = 'El coche que me gusta es rojo.';
$frase2 = 'Iremos al cine la semana que viene.';
$frase3 = 'Mientras desarollo no me gusta escuchar música.';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 1</title>
</head>

<body>

    <header>
        <h1>Frases</h1>
    </header>

    <main>
        <p> <?php echo $frase1 ?> </p>
        <p> <?php print $frase2 ?> </p>
        <p> <?php printf("%s", $frase3) ?> </p>
        
        <?php
         // Estas son las tres formas de mostrar por pantalla.
         
         /**
          * Hacemos uso de las variales $... y posteriormente las inyectados para mostrarlas por pantalla.
          */
        ?>


    </main>

    <footer></footer>

</body>

</html>