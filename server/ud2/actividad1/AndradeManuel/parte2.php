<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 2</title>
</head>
<body>

<?php
    $nombre = "Manuel";
    $apellido1 = "Andrade";
    $apellido2 = "Vidal";
    $email = "Manuel@gmail.com";
    $anioNacimiento = 2003;
    $movil = "622516084";
?>

<table>
    <caption>Datos Personales</caption>
    <tr>
        <th>Nombre</th>
        <td><?= $nombre ?></td>
    </tr>
    <tr>
        <th>Primer Apellido</th>
        <td><?= $apellido1 ?></td>
    </tr>
    <tr>
        <th>Segundo Apellido</th>
        <td><?= $apellido2 ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= $email ?></td>
    </tr>
    <tr>
        <th>Año de Nacimiento</th>
        <td><?= $anioNacimiento ?></td>
    </tr>
    <tr>
        <th>Móvil</th>
        <td><?= $movil ?></td>
    </tr>
</table>

</body>
</html>