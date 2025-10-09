<?php
$nombre = isset($_GET["nombre"]) ? $_GET["nombre"] : '';
$apellido1 = isset($_GET["apellido1"]) ? $_GET["apellido1"] : '';
$apellido2 = isset($_GET["apellido2"]) ? $_GET["apellido2"] : '';
$email = isset($_GET["email"]) ? $_GET["email"] : '';
$anioNacimiento = isset($_GET["anioNacimiento"]) ? $_GET["anioNacimiento"] : '';
$movil = isset($_GET["movil"]) ? $_GET["movil"] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Datos recibidos</title>
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