<?php

if (isset($_GET["nombre"])) {
$nombre = $_GET["nombre"];
$apellido1 = $_GET["apellido1"];
$apellido2 = $_GET["apellido2"];
$email = $_GET["email"];
$anioNacimiento = $_GET["anioNacimiento"];
$movil = $_GET["movil"];
} else {
    echo "<p>No se han recibido los datos,vuelve al formulario <a href='parte3.html'>parte3.html</a></p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos recibidos</title>
</head>
<body>
    <h2>Datos personales recibidos</h2>

<table>
    <tr><td>NMi nombre</td><td><?php echo $nombre; ?></td></tr>
    <tr><td>Mi primer apellido</td><td><?php echo $apellido1; ?></td></tr>
    <tr><td>Mi segundo apellido</td><td><?php echo $apellido2; ?></td></tr>
    <tr><td>Mi email</td><td><?php echo $email; ?></td></tr>
    <tr><td>Mi año de nacimiento</td><td><?php echo $anioNacimiento; ?></td></tr>
    <tr><td>Mi telefono</td><td><?php echo $movil; ?></td></tr>
</table>

</body>
</html>