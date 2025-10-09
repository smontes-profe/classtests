<?php
// Mostrar todos los errores y advertencias
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejemplo PHP + JS</title>
  
</head>
<body>
  <h1>Primeros pasos con PHP</h1>

  <h2>Fecha y hora actual</h2>
  <?php
    // Definición de variables en PHP
    echo "Hoy es " . date("d/m/Y") . "<br>";
    echo "Hora actual: " . date("H:i:s") . "<br><br>";

    $nombre = "Rafael";
    $apellidos = "Verdugo";
    $edad = 19;

    echo "Soy $nombre $apellidos, y tengo $edad años.<br>";

    // Calcular edades futuras
    $edad10 = $edad + 10;
    $edad20 = $edad + 20;
    $edadx2 = $edad * 2;
  ?>

  <br>
  <!-- Botones -->
  <button onclick="mostrarResultado('10')">Hacer pasar 10 años</button>
  <button onclick="mostrarResultado('20')">Hacer pasar 20 años</button>
  <button onclick="mostrarResultado('doble')">Que pase el doble</button>

  <br><br>
  <!-- Aquí se mostrará el resultado -->
  <p id="resultado" style="font-weight: bold; color: blue;"></p>
</body>
<script>
    // Función común para todos los botones
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
</html>
