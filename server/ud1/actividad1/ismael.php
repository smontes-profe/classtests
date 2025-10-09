<?php
// --- Datos del usuario ---
$fecha = date("d/m/Y"); // Día/Mes/Año
$hora = date("H:i:s"); // Hora:Minutos:Segundos en formato 24h
$nombre = ("Ismael");
$apellidos = ("Vargas Duque");
$edadActual = ("22"); 
$edad10 = ($edadActual + 10);
$edad20 = ($edadActual + 20);
$edadx2 = ($edadActual * 2);
// --- Configuración de errores ---
$error= error_reporting(E_ALL);
$displayError = ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<!-- EJERCICIOS -->
<h1>PARTE 1</h1>
<p>La fecha de hoy es: <?php echo($fecha);?></p>
<p>Son las: <?php echo($hora);?></p>
<h1>PARTE 2</h1>
<?php echo "Soy $nombre $apellidos y tengo $edadActual años" ?>
<h1>PARTE 3</h1>
<?php echo "Mi edad + 10 son: $edad10"?>
<?php echo "Mi edad + 20 son: $edad20"?>
<?php echo "Mi edad x 2 son: $edadx2"?>
<h1>PARTE 4</h1>
<!-- Botónes -->
<button onclick="mostrarResultado('10')">Hacer pasar 10 años</button>
<button type="button" onclick="mostrarResultado('20')">Hacer pasar 20 años</button>
<button type="button" onclick="mostrarResultado('doble')">Que pase el doble</button>
<!-- Aquí aparecerá el resultado --> 
<div id="resultado">Pulsa un botón para ver el resultado.</div>
<h1>PARTE 5</h1>
<?php
echo "ERRORES: $error"?>
<br>
<?php
echo "DISPLAY ERRORS: $displayError";
?>
<script>
// Función común para todos los botones
function mostrarResultado(opcion) {
let resultado = "";
// Yo pensé en inicializar las variables en JavaScript, pero viendo que tenía 
// que usar PHP por el bloque de script que hay en el enunciado.
switch (opcion) {
case "10":
resultado = <?php echo $edad10; ?>;
document.getElementById("resultado").innerHTML =
`Dentro de 10 años tendré ${resultado}.`;
break;
case "20":
resultado = <?php echo $edad20; ?>;
document.getElementById("resultado").innerHTML =
`Dentro de 20 años tendré ${resultado}.`;
break;
case "doble":
resultado = <?php echo $edadx2; ?>;
document.getElementById("resultado").innerHTML =
`El doble de mi edad es ${resultado}.`;
break;
}
}
</script>



</body>
</html>