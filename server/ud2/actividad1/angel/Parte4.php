<?php
// 4. parte4.php: Sabiendo la edad de una persona, mostrar la edad que tendrá dentro de 
// 10 años y hace 10 años. Además, muestra qué año será en cada uno de los casos. Finalmente,
// muestra el año de jubilación suponiendo que trabajarás hasta los 67 años. En este caso, no
// hace falta que previamente crees un formulario, puedes probar el ejercicio directamente vía 
//URL: parte4.php?edad=33. Tip: $anyoActual = date("Y");

$edad = -33;

$edadDentroDe10Anios = $edad + 10;

$edadHace10Anios = $edad - 10;

$anyoActual = date("Y");

$anyoDentroDe10Anios = $anyoActual + 10;

$anyoHace10Anios = $anyoActual - 10;

$anyoJubilacion = $anyoActual + (67 - $edad);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>

<body>
    <section>
        <h4>Edad actual</h4>
        <p>Tienes <?php echo $edad; ?> años.</p>
    </section>

    <hr>

    <section>
        <h4>Edad dentro de 10 años</h4>
        <p>En 10 años tendrás <?php echo $edadDentroDe10Anios; ?> años.</p>
    </section>

    <hr>

    <section>
        <h4>Edad hace 10 años</h4>
        <p>Hace 10 años tenías <?php echo $edadHace10Anios; ?> años.</p>
    </section>

    <hr>

    <section>
        <h4>Año dentro de 10 años</h4>
        <p>Dentro de 10 años estaremos en el año <?php echo $anyoDentroDe10Anios; ?>.</p>
    </section>

    <hr>

    <section>
        <h4>Año hace 10 años</h4>
        <p>Hace 10 años estábamos en el año <?php echo $anyoHace10Anios; ?>.</p>
    </section>

    <hr>

    <section>
        <h4>Año de jubilación</h4>
        <p>Tu jubilación será en el año <?php echo $anyoJubilacion; ?>.</p>
    </section>

</body>

</html>