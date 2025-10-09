
<?php 
/*DEfinir tres variables $edad10, $edad20, y $edadx2 que correspondan, respectivamente,  a la suma de la edad del usario + 10, +20 o a la edad por 2.
Incluir tres botones "hacer pasar 10 años", "hacer pasar 20 años", y "Que pase el doble". Al pulsarlos, todos deben llamar a la misma función en javascript, que muestre la var de php correspondiente al botón mostrado($edad10, $edad20, y $edadx2). Esta parte se debe hacer sin enviar un fomulario en php, sino usando una función en javascript que se desencadene cuando se pulse el botón y que obtenga  el resultado final de bloquecitos de php insertados en el javascript.
Utilizar una directiva de configuración de PHP, por ejemplo error_reporting(E_ALL); o ini_set("display_errors", 1);.*/

    $usuario = "Rubén";
    $apellidos = "Ojeda León";
    $edad = 21;
    echo "<p>Hola, soy $usuario $apellidos y tengo $edad años.</p>";
    $edad10 = $edad + 10;
    $edad20 = $edad + 20;
    $edadx2 = $edad * 2;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./botones.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Fecha de Hoy</h1>
    <p>Hoy es: <?php echo date("Y/m/d"); ?></p>
    <p>La hora actual del servidor es: <?php echo date("H:i:s"); ?></p>
    
    <button onclick="mostrarEdad(<?php echo $edad10; ?>)">Hacer pasar 10 años</button>
    <button onclick="mostrarEdad(<?php echo $edad20; ?>)">Hacer pasar 20 años</button>
    <button onclick="mostrarEdad(<?php echo $edadx2; ?>)">Que pase el doble</button>

    <p id="resultado"></p>
</body>
</html>