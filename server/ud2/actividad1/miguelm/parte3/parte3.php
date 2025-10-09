<?php
$name = $_GET["name"] ?? '';
$firstSurname = $_GET["firstSurname"] ?? '';
$secondSurname = $_GET["secondSurname"] ?? '';
$yearOfBirth = $_GET["yearOfBirth"] ?? '';
$phonenumber = $_GET["phonenumber"] ?? '';
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