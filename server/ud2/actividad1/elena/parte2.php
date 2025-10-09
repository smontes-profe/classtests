
<?php
$nombre;
$primerApellido;
$segundoApellido;
$email;
$anioNacimiento;
$movil;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 2</title>
</head>

<body>

    <?php 

        $nombre = "Elena"; // Variable nombre
        $pimerApellido = "Mena"; // Variable primer apellido
        $segundoApellido = "Romero"; // Variable segundo apellido
        $email = "menaromero.elena@gmail.com"; // Variable email
        $anioNacimiento = 2006; // Variable año nacimiento
        $movil = 123456789; // Variable movil

    ?>

    <table>
        <caption>Mis datos</caption>
        <tr>
            <th>Nombre</th>
            <th>Primer apellido</th>
            <th>Segundo apellido</th>
            <th>Email</th>
            <th>Año nacimiento</th>
            <th>Movil</th>
        </tr>
        <tr>
            <td><?php echo $nombre;?></td>
            <td><?php echo $primerApellido;?></td>
            <td><?php echo $segundoApellido;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $anioNacimiento;?></td>
            <td><?php echo $movil;?></td>
        </tr>
    </table>

</body>
</html>


