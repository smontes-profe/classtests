<?php

if (isset($_GET["edad"])) {
    $edad = $_GET["edad"];
    $anyoActual = date("Y");
    $edadFuturo = $edad + 10;
    $edadPasado = $edad - 10;
    $anyoFuturo = $anyoActual + 10;
    $anyoPasado = $anyoActual - 10;
    $anyoNacimiento = $anyoActual - $edad;
    $anyoJubilacion = $anyoNacimiento + 67;
} else {
 echo "<p>No has puesto la edad,ejemplo de uso: <strong>parte4.php?edad=33</strong></p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo de edades</title>
</head>
<body>
   <h2>Calculo de edades</h2>

<table>
    <tr>
        <td>Edad que tiene ahora</td>
        <td><?php echo $edad; ?> años</td>
    </tr>
    <tr>
        <td>Edad dentro de 10 años</td>
        <td><?php echo $edadFuturo; ?> años</td>
    </tr>
    <tr>
        <td>Edad que tiene hace 10 años</td>
        <td><?php echo $edadPasado; ?> años</td>
    </tr>
    <tr>
        <td>El año actual</td>
        <td><?php echo $anyoActual; ?></td>
    </tr>
    <tr>
        <td>Año dentro de 10 años</td>
        <td><?php echo $anyoFuturo; ?></td>
    </tr>
    <tr>
        <td>Año hace 10 años</td>
        <td><?php echo $anyoPasado; ?></td>
    </tr>
    <tr>
        <td>Año de nacimiento aproximado</td>
        <td><?php echo $anyoNacimiento; ?></td>
    </tr>
    <tr>
        <td>Año de jubilacion</td>
        <td><?php echo $anyoJubilacion; ?></td>
    </tr>
</table> 
</body>
</html>