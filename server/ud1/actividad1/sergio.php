<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sergio Gómez Galván</title>
</head>
<body>
<div class="container">
<h1>Información</h1> 
<?php 
// Declaramos la hora
date_default_timezone_set('Europe/Madrid');
$fecha_actual = date('d/m/Y');
$hora_actual = date('H:i:s');
// Declaramos variables
$nombre = "Sergio";
$apellidos = "Gómez";
$edad_actual = 21;
// Calculamos edades futuras
$edad10 = $edad_actual + 10;
$edad20 = $edad_actual + 20;
$edadx2 = $edad_actual * 2;
?>
<!--Mostramos la fecha y hora -->
<div class="info">
<h2>Fecha y Hora Actual</h2>
<p>Hoy es <span class="highlight"><?php echo $fecha_actual; ?></span> y son las <span class="highlight"><?php echo $hora_actual; ?>
</span></p>
</div>
<!--Mostramos mi informacion personal -->
<div class="info">
<h2>Información Personal</h2>
<p>Soy <span class="highlight"><?php echo $nombre . " " . $apellidos; ?></span>, y tengo <span class="highlight"><?php echo 
$edad_actual; ?> años</span>.</p>
</div>
<!--Mostramos la calculadora de la edad -->
<div class="info">
<h2>Calculadora de Edad</h2>
<p>Pulsa los botones para ver cómo será tu edad en el futuro:</p>
<div class="buttons">
<button onclick="mostrarResultado('10')">Hacer pasar 10 años</button>
<button onclick="mostrarResultado('20')">Hacer pasar 20 años</button>
<button onclick="mostrarResultado('doble')">Que pase el doble</button>
</div>
<div id="resultado" class="result"></div>
</div>
</div>
<!--Mostramos el resultado del calculo de la edad -->
<script>
function mostrarResultado(opcion) {
let resultado = "";
switch(opcion) {
case "10":
resultado = <?php echo $edad10; ?>;
document.getElementById("resultado").innerHTML =
`Dentro de 10 años tendré ${resultado} años.`;
break;
case "20":
resultado = <?php echo $edad20; ?>;
document.getElementById("resultado").innerHTML =
`Dentro de 20 años tendré ${resultado} años.`;
break;
case "doble":
resultado = <?php echo $edadx2; ?>;
document.getElementById("resultado").innerHTML =
`El doble de mi edad es ${resultado} años.`;
break;
}
}
</script>
</body>
</html>