<?php
// Simple ejemplo en PHP
$mensaje = "¡Hola desde PHP!";
$fecha = date("d/m/Y H:i:s");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Backend con PHP</title>
</head>
<body>
  <h1><?php echo $mensaje; ?></h1>
  <p>La fecha y hora actual es: <?php echo $fecha; ?></p>
</body>
</html>
