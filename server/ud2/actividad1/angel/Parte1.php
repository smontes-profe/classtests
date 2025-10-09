<?php

// 1. parte1.php: muestra 3 frases, cada una en un párrafo utilizando las tres posibilidades que 
// existen de mostrar contenido. Tras ello, introduce dos comentarios, uno de bloque y otro de una línea.
$frase1 = "Esta frase es para mostrarla por echo";
$frase2 = "Esta frase es para mostrarla por print";
$frase3 = "Esta frase es para mostrarla por print_r";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frases Simples</title>
</head>
<body>
    <?php 
    echo "<p>$frase1</p>"; // Mostrando la primera frase con echo
    print "<p>$frase2</p>"; // Mostrando la segunda frase con print
    print_r("<p>$frase3</p>"); // Mostrando la tercera frase con print_r
    ?>
</body>
</html>