<?php
$nombre = "Álvaro";
$apellido1 = "Escudero";
$apellido2 = "Delgado";
$email = "alvaroescudero02@alumnos.ilerna.com";
$anioNacimiento = 2002;
$movil = "655264595";
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Datos personales</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<table>
<tr><th>Nombre</th><td><?= $nombre ?></td></tr>
<tr><th>Primer Apellido</th><td><?= $apellido1 ?></td></tr>
<tr><th>Segundo Apellido</th><td><?= $apellido2 ?></td></tr>
<tr><th>Email</th><td><?= $email ?></td></tr>
<tr><th>Año Nacimiento</th><td><?= $anioNacimiento ?></td></tr>
<tr><th>Móvil</th><td><?= $movil ?></td></tr>
</table>
</body>
</html>