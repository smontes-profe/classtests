<?php


$edad = $_GET['edad'] ?? 0;
$anyoActual = date("Y");   
$edad1 = $edad + 10;
$edad2 = $edad - 10;
$anyo1 = $anyoActual + 10;
$anyo2 = $anyoActual - 10;
$anyoJubilacion = $anyoActual + (67 - $edad);

echo "<p>Dentro de 10 años tendrás $edad1 años, y el año será $anyo1</p>";
echo "<p>Hace 10 años tenías $edad2 años, y el año era $anyo2</p>";
echo "<p>Te jubilarás en el año $anyoJubilacion</p>";
?>