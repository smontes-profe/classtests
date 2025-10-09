<?php

$nombre = "Sergio";
$apellido1 = "Gomez";
$apellido2 = "Galvan";
$email = "lolua6339@alumnos.ilerna.com";
$anioNacimiento = 2004;
$movil = "654234654";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis datos</title>
</head>

<body>
<h2>Mis datos</h2>

<table>
    <tr>
        <td>Mi nombre</td>
        <td><?php echo $nombre; ?></td>
    </tr>
    <tr>
        <td>Mi primer apellido</td>
        <td><?php echo $apellido1; ?></td>
    </tr>
    <tr>
        <td>Mi segundo apellido</td>
        <td><?php echo $apellido2; ?></td>
    </tr>
    <tr>
        <td>Mi email</td>
        <td><?php echo $email; ?></td>
    </tr>
    <tr>
        <td>Mi año en el que naci</td>
        <td><?php echo $anioNacimiento; ?></td>
    </tr>
    <tr>
        <td>Mi telefono</td>
        <td><?php echo $movil; ?></td>
    </tr>
</table>

</body>
</html>