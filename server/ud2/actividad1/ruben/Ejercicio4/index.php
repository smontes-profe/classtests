<?php
/*4. parte4.php: Sabiendo la edad de una persona, mostrar la edad 
que tendrá dentro de 10 años y hace 10 años. Además, muestra qué 
año será en cada uno de los casos. Finalmente, muestra el año de 
jubilación suponiendo que trabajarás hasta los 67 años. En este 
caso, no hace falta que previamente crees un formulario, puedes 
probar el ejercicio directamente vía URL: parte4.php?edad=33. 
Tip: $anyoActual = date("Y");*/

$edad = $_GET["edad"];
$anyoActual = date("Y");
$const_jubilacion = 67;
$edad_dentro_10 = $edad + 10;
$edad_hace_10 = $edad - 10;

echo ("Dentro de 10 años tendrás". $edad_dentro_10." años, y el año será ".($anyoActual + 10))."<br>";
echo ("Hace 10 años tenías $edad_hace_10 años, y el año era ".($anyoActual - 10))."<br>";
echo ("Te jubilarás en el año ".($anyoActual + ($const_jubilacion - $edad)))."<br>";
?>