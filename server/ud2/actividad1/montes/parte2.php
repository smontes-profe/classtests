<?php
$name = "Fran";
$subname = "Montes";
$subname2 = "Belloso";
$email = "email@email.com";
$birthDate = "03 / 04 / 1995"; // Guardada como texto
$phone = 666555333;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>TABLA CON DATOS PERSONALES</h1>
    <table border = 2 >
        <th>
            <tr>
                <td>Nombre</td>
                <td>1º Apellido</td>
                <td>2º Apellido</td>
                <td>Email</td>
                <td>Edad</td>
                <td>Teléfono</td>
            </tr>
        </th>
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $subname; ?></td>
            <td><?php echo $subname2; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $birthDate; ?></td>
            <td><?php echo $phone; ?></td>
        </tr>
    </table>
</body>

</html>