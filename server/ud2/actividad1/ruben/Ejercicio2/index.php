<?php
/*2. parte2.php: Escribe un programa que almacene en variables 
tu nombre, primer apellido, segundo apellido, email, año en el 
que naciste y móvil. Luego muéstralos por pantalla dentro de 
una tabla.*/

$name = "Ruben";
$surname1 = "Ojeda";
$surname2 = "Leon";
$email = "rubenojedaleon@gmail.com";
$birthYear = 2004;
$mobile = "123456789";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
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
            <td><?php echo $surname1; ?></td>
            <td><?php echo $surname2; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $birthYear; ?></td>
            <td><?php echo $mobile; ?></td>
        </tr>
</body>
</html>