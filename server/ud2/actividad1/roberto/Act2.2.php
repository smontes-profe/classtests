<?php

/* parte2.php: Escribe un programa que almacene en variables
 tu nombre, primer apellido, segundo apellido,
  email, año en el que naciste y móvil.
 Luego muéstralos por pantalla dentro de una tabla. */ 

$nombre = "Roberto";
$apellido1 = "Muñoz";
$apellido2 = "Jimenez";
$email = "robermj999@gail.com";
$año = 2006;
$movil = "Iphone13"
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
</head>
<body>
    <table border="1">
        <tr>
        <td><?php echo $nombre ?></td>
        </tr>
        <tr>
        <td><?php echo $apellido1 ?></td>
        </tr>
        <tr>
        <td><?php echo $apellido2 ?></td>
        </tr>
        <tr>
        <td><?php echo $email ?></td>
        </tr>
        <tr>
        <td><?php echo $año ?></td>
        </tr>
        <tr>
        <td><?php echo $movil ?></td>
        </tr>
    </table>
    
</body>
</html>

