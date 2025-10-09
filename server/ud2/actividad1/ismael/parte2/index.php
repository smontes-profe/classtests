<!-- 2. parte2.php: Escribe un programa que almacene en variables tu nombre, primer apellido, segundo apellido, email, año en el que naciste y móvil. Luego muéstralos por pantalla dentro de una tabla.  //1,5 PUNTOS. -->

<?php
$nombre = "Ismael";
$primerApellido = "Vargas";
$segundoApellido = "Duque";
$email = "ismaelvargasduque14@gmail.com";
$anioNacimiento = "24/03/2003";
$movil = "677 71 99 81";

?>
<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Parte 2</title>
</head>
<body>
  <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Campo</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td> <?php echo $nombre ?> </td>
        </tr>
        <tr>
            <td>Primer Apellido</td>
            <td> <?php echo $primerApellido ?> </td>
        </tr>
        <tr>
            <td>Segundo Apellido</td>
            <td> <?php echo $segundoApellido ?> </td>
        </tr>
        <tr>
            <td>Email</td>
            <td> <?php echo $email ?> </td>
        </tr>
        <tr>
            <td>Año de Nacimiento</td>
            <td> <?php echo $anioNacimiento ?> </td>
        </tr>
        <tr>
            <td>Móvil</td>
            <td> <?php echo $movil ?> </td>
        </tr>
    </table>
</body>
</html>
