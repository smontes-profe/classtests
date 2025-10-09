<?php
// index.php - tarea de PHP
// Soy Álvaro Escudero, 23 años, 2DAW
// pongo esto para que me salgan los errores y no me vuelva loco buscándolos
error_reporting(E_ALL);
ini_set("display_errors", 1);
// // pongo la hora de España para que no me salga con otra zona
date_default_timezone_set('Europe/Madrid');
// mis datos guardados en variables
$nombre = "Álvaro"; 
$apellidos = "Escudero"; 
$edad = 23; 
// hago las operaciones con mi edad
$edad10 = $edad + 10; // dentro de 10 años
$edad20 = $edad + 20; // dentro de 20 años
$edadx2 = $edad * 2; // el doble de mi edad
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Primeros pasos en PHP</title>
</head>
<body>
 <h1>Ejercicio: Primeros pasos en PHP</h1>
 <!-- saco la fecha y hora actuales -->
 <p>La fecha y hora actuales son: <?php echo date("d/m/Y H:i:s"); ?></p>
 <!-- saco mi nombre, apellidos y edad -->
 <p>Soy <?php echo "$nombre $apellidos"; ?> y tengo <?php echo $edad; ?> años.</p>
 <!-- botones que harán que cambie el resultado -->
 <button onclick="mostrarResultado('10')">Hacer pasar 10 años</button>
 <button onclick="mostrarResultado('20')">Hacer pasar 20 años</button>
 <button onclick="mostrarResultado('doble')">Que pase el doble</button>
 <!-- aquí se verá el texto cuando pulse los botones -->
 <p id="resultado"></p>
 <script>
// función que se ejecuta al pulsar un botón
function mostrarResultado(opcion) {
let resultado = "";
switch(opcion) {
case "10":
// aquí PHP mete el número ya calculado
resultado = <?php echo $edad10; ?>;
document.getElementById("resultado").innerHTML =
`Dentro de 10 años tendré ${resultado}.`;
break;
case "20":
// lo mismo pero con 20 años más
resultado = <?php echo $edad20; ?>;
document.getElementById("resultado").innerHTML =
`Dentro de 20 años tendré ${resultado}.`;
break;
case "doble":
// y aquí el doble de mi edad
resultado = <?php echo $edadx2; ?>;
document.getElementById("resultado").innerHTML =
`El doble de mi edad es ${resultado}.`;
break;
}
}
 </script>
</body>
</html>