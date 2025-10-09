<?php

$name = "Rafael";
$firstSurname = "Verdugo";
$secondSurname = "Durán";
$email = "rafaelverdugoduran1@gmail.com";
$birthYear = 2006;
$mobile = 621000706;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Email</th>
            <th>Año de Nacimiento</th>
            <th>Móvil</th>
        </tr>
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $firstSurname; ?></td>
            <td><?php echo $secondSurname; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $birthYear; ?></td>
            <td><?php echo $mobile; ?></td>
        </tr>
    </table>
</body>
</html>