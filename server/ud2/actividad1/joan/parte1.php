<!--
1. parte1.php: muestra 3 frases, 
cada una en un párrafo utilizando las tres posibilidades que existen de mostrar contenido. 
Tras ello, introduce dos comentarios, uno de bloque y otro de una línea. //1 PUNTO.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        echo "<p>Frase 1: Esta es la primera frase.</p>";

        print "<p>Frase 2: Esta es la segunda frase.</p>"; 
    
        // Este es un comentario de una línea


        /*
            Este es un comentario de bloque
            puedes poner mas de una linea

        */
    ?>
    <?= "<p>Frase 3: Esta es la tercera frase.</p>"; ?>
    

</body>
</html>