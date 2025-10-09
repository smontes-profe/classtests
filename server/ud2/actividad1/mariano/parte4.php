<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Parte4</title>
</head>
<body>

<?php
// edad desde la URL
    $edad = isset($_GET['edad']) ? $_GET['edad']:21;

   
    $anoActual = date("Y");

    
    $edadDentro10 = $edad + 10;
    $edadHace10 = $edad - 10;

    $anoDentro10 = $anoActual + 10;
    $anoHace10 = $anoActual - 10;

    $anoNacimiento = $anoActual - $edad;
    $anoJubilacion = $anoNacimiento + 67;

   
    echo "<h2>Resultados</h2>";
    echo "<p>Edad actual: $edad años (Año actual: $anoActual)</p>";
    echo "<p>Hace 10 años tenías $edadHace10 años (Año: $anoHace10)</p>";
    echo "<p>Dentro de 10 años tendrás $edadDentro10 años (Año: $anoDentro10)</p>";
    echo "<p>Año de nacimiento aproximado: $anoNacimiento</p>";
    echo "<p>Te jubilarás en el año $anoJubilacion con 67 años.</p>";

?>

</body>
</html>
