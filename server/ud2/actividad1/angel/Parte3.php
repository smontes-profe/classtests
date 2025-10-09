<?php
// Recogemos los datos enviados por GET
$nombre = $_GET['nombre'] ?? '';
$primerApellido = $_GET['primerApellido'] ?? '';
$segundoApellido = $_GET['segundoApellido'] ?? '';
$email = $_GET['email'] ?? '';
$nacimiento = $_GET['nacimiento'] ?? '';
$movil = $_GET['movil'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Recibidos</title>
</head>

<body>
    <h2>Datos Recibidos</h2>

    <?php if ($nombre !== ''): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><?= $nombre ?></td>
            </tr>
            <tr>
                <td>Primer Apellido</td>
                <td><?= $primerApellido ?></td>
            </tr>
            <tr>
                <td>Segundo Apellido</td>
                <td><?= $segundoApellido ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $email ?></td>
            </tr>
            <tr>
                <td>Año de Nacimiento</td>
                <td><?= $nacimiento ?></td>
            </tr>
            <tr>
                <td>Móvil</td>
                <td><?= $movil ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p>No se han recibido datos. Por favor, rellena el <a href="parte3.html">formulario</a>.</p>
    <?php endif; ?>
</body>

</html>