<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $horaActual = date("H - i - s");

    $nombre = "Ángel Jiménez";
    $edad = 19;

    $edad10 = $edad + 10;
    $edad20 = $edad + 20;
    $edadx2 = $edad * 2;
    echo $eoo;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrimerosPasosPHP</title>
</head>

<body>
    <h3>1- Mostrar en la página HTML la fecha y hora actuales usando PHP embebido.</h3>
    <p> <?= $horaActual ?> </p>

    <h3>2- Definir variables con el nombre del usuario, los apellidos y su edad actual y mostrarlas en pantalla. Por ej. mostrando "Soy Sergio Montes, y tengo 25 años" (ya quisiera!), sacando el nombre y los apellidos de las variables/constantes.</h3>
    <p>Hola soy <?= $nombre ?> y tengo <?= $edad ?> años</p>

    <h3>3- Definir tres variables $edad10, $edad20, y $edadx2 que correspondan, respectivamente,  a la suma de la edad del usario + 10, +20 o a la edad por 2.</h3>
    <p>Dentro de 10 años tendré <?= $edad10 ?>, dentro de 20 años tendré <?= $edad20 ?>, y el doble de mi edad es <?= $edadx2 ?>.</p>

    <h3>4- Incluir tres botones "hacer pasar 10 años", "hacer pasar 20 años", y "Que pase el doble". Al pulsarlos, todos deben llamar a la misma función en javascript, que muestre la var de php correspondiente al botón mostrado($edad10, $edad20, y $edadx2). Esta parte se debe hacer sin enviar un fomulario en php, sino usando una función en javascript que se desencadene cuando se pulse el botón y que obtenga  el resultado final de bloquecitos de php insertados en el javascript.</h3>
    <button onclick="mostrarResultado('10')">Hacer pasar 10 años</button>
    <button onclick="mostrarResultado('20')">Hacer pasar 20 años</button>
    <button onclick="mostrarResultado('doble')">Que pase el doble</button>

    <p id="resultado"></p>

    <h3>5- Utilizar una directiva de configuración de PHP, por ejemplo error_reporting(E_ALL); o ini_set("display_errors", 1);.</h3>
    <p>Se ha activado <code>error_reporting(E_ALL)</code> e <code>ini_set("display_errors", 1)</code> al inicio del archivo, por lo que todos los errores de PHP se mostrarán en pantalla durante la ejecución.</p>

     <script>
        // Función común para todos los botones
        function mostrarResultado(opcion) {
            let resultado = "";

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