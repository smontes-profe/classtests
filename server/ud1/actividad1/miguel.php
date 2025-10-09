<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Primeros pasos en php</h1>
	<h2>Hora y fecha</h2>
	<p><?php echo date('d/m/Y H:i:s'); ?></p>
	<h2>Variables y tipos de datos</h2>
	<?php
		$nombre = "Miguel";
		$edad = 22;
		
		echo "<p>Hola, me llamo $nombre y tengo $edad años.</p>";

		$edad10 = $edad + 10;
		$edad20 = $edad +20;
		$edadx2 = $edad *2;
	?>
	
	<script>

    // Función común para todos los botones

    function mostrarResultado(opcion) {
			

			  document.getElementById("resultado").innerHTML = "Tendré " + opcion + " años.";
     

    }

  </script>

  <button onclick="mostrarResultado(<?php echo $edad10; ?>);">Hacer pasar 10 años</button>
	<button onclick="mostrarResultado(<?php echo $edad20; ?>);">Hacer pasar 20 años</button>
	<button onclick="mostrarResultado(<?php echo $edadx2; ?>);">Que pase el doble</button>
	<p id="resultado"></p>