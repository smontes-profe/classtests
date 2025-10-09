<!-- 4. parte4.php: Sabiendo la edad de una persona, mostrar la edad que tendrá dentro de 10 años y hace 10 años. 
 Además, muestra qué año será en cada uno de los casos. Finalmente, muestra el año de jubilación suponiendo que trabajarás hasta los 67 años. 
 En este caso, no hace falta que previamente crees un formulario, puedes probar el ejercicio directamente vía URL: parte4.php?edad=33. Tip: $anyoActual = date("Y"); //2,5 PUNTOS.

 -->


<?php
$edadPersona = -22;

$anioActual = date("Y");

$edadPersonaPasado = $edadPersona - 10;
$edadPersonaFuturo = $edadPersona + 10;

$anioHace10 = $anioActual - 10;
$anioDentro10 = $anioActual + 10;

$anioJubilacion = $anioActual + (67 - $edadPersona);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Parte 4 - Edad y jubilación</title>
</head>
<body>
  <h2>Edad y proyecciones</h2>

  <p>Edad actual: <strong><?php echo $edadPersona; ?> años</strong></p>
  <p>Hace 10 años tenías: <strong><?php echo $edadPersonaPasado; ?> años</strong> (año <?php echo $anioHace10; ?>)</p>
  <p>Dentro de 10 años tendrás: <strong><?php echo $edadPersonaFuturo; ?> años</strong> (año <?php echo $anioDentro10; ?>)</p>
  <p>Año de jubilación (trabajando hasta los 67 años): <strong><?php echo $anioJubilacion; ?></strong></p>
</body>
</html>

