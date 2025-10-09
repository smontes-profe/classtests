<?php include 'actividad3Logica.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Actividad 3</title>
</head>
<body>
    <form action="" method="get">
        <p>Escribe tu nombre: <input type="text" name="nombre" /></p>
        <p>Escribe tus apellidos: <input type="text" name="papellido" /> <input type="text" name="sapellido" /></p>
        <p>Escribe tu edad: <input type="text" name="edad" /></p>
        <p>Escribe tu email: <input type="text" name="email" /></p>
        <p>Escribe tu año de nacimiento: <input type="text" name="año" /></p>
        <p>Escribe tu número de móvil: <input type="text" name="movil" /></p>
        <p><button type="submit">Enviar</button></p>
    </form>

    <?php if ($nombre !== ""): ?>
        <table border="1">
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
            <tr><td>Nombre</td><td><?= $nombre ?></td></tr>
            <tr><td>Primer Apellido</td><td><?= $papellido ?></td></tr>
            <tr><td>Segundo Apellido</td><td><?= $sapellido ?></td></tr>
            <tr><td>Edad</td><td><?= $edad ?></td></tr>
            <tr><td>Email</td><td><?= $email ?></td></tr>
            <tr><td>Año de nacimiento</td><td><?= $año ?></td></tr>
            <tr><td>Móvil</td><td><?= $movil ?></td></tr>
        </table>
    <?php endif; ?>
</body>
</html>
