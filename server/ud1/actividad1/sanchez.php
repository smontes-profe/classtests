<?php

error_reporting(E_ALL);  // Indica aquellos errores que queremos reportar y E_ALL los niveles de esos errores o advetencias
ini_set("display_errors", 1); // Directiva que configura PHP en ejecución, dándonos a elegir si mostar (1) o no (0) los errores en a pantalla del navegador (ambos modos guardan cierta información en el log)

$nombreUsuario = "Miguel";
$apellidoUsuario = "Sánchez Vázquez";
$edadActual = 35;

$edad10 = $edadActual + 10;
$edad20 = $edadActual + 20;
$edadDoble = $edadActual * 2;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2</title>
</head>
<body>
    <header></header>
    <main>
        <div>
            <h3>Fecha y horas actuales</h3>
            <p><?php echo date("d/m/Y H:i:s"); ?></p>
        </div>
        <div>
            <h3>Datos personales</h3>
           <?php echo "Soy $nombreUsuario $apellidoUsuario y tengo $edadActual años."?>
           <br>
        </div>
         <div>
            <button type="button" onclick="mostrarResultado('10')">Suma 10 a tu edad</button>
            <button type="button" onclick="mostrarResultado('20')">Suma 20 a tu edad</button>
            <button type="button" onclick="mostrarResultado('doble')">El doble de tu edad</button>

            <p id="resultado"></p>
        </div>
    </main>
    <footer></footer>

    <script>

    // Función común para todos los botones

    function mostrarResultado(opcion) {

      let resultado = "";

      switch(opcion) {

        case "10":

          resultado = <?php echo $edad10?>

          document.getElementById("resultado").innerHTML =

            `Dentro de 10 años tendré ${resultado}.`;

          break;

        case "20":
          resultado = <?php echo $edad20; ?>;

          document.getElementById("resultado").innerHTML =

            `Dentro de 20 años tendré ${resultado}.`;

          break;

        case "doble":
          resultado = <?php echo $edadDoble; ?>;

          document.getElementById("resultado").innerHTML =

            `El doble de mi edad es ${resultado}.`;

          break;

      }
    }

  </script>
</body>
</html>