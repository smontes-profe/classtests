
<!-- 1. parte1.php: muestra 3 frases, cada una en un párrafo utilizando las tres posibilidades que existen de mostrar contenido. Tras ello, introduce dos comentarios, uno de bloque y otro de una línea. //1 PUNTO. -->

<?php

$frase1 = "La primera frase es la mejor de todas";
$frase2 = "La segunda frase no es tan buena como la primera";
$frase3 = "La tercera frase no vale pa'na";


?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Parte 1</title>
</head>
<body>

<?php
/* Comentario de bloque:
   Mostramos tres frases cada una con una manera diferente para mostrar por pantalla.
*/
// Comentario de una sola línea: la primera frase se muestra con echo
echo($frase1);
?>

<br>

<?php
// la segunda frase se muestra con print
print($frase2);
?>

<br>

<?php
// la tercera frase se muestra con print_r
print_r($frase3);
?>

</body>
</html>
