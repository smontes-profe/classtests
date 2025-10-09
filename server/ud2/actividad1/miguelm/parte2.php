<?php
$name = "Miguel";
$firstSurname = "Moreno";
$secondSurname = "Galán";
$yearOfBirth = 2002;
$phonenumber = "722 222 158";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Simple</title>
</head>
<body>
    <table>
        <tr border="1">
            <td>Nombre</td>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td>Primer Apellido</td>
            <td><?php print $firstSurname; ?></td>
        </tr>
        <tr>
            <td>Segundo Apellido</td>
            <td><?php echo $secondSurname; ?></td>
        </tr>
        <tr>
            <td>Año de Nacimiento</td>
            <td><?php print $yearOfBirth; ?></td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td><?php echo $phonenumber; ?></td>
        </tr>
    </table>
</body>
</html>