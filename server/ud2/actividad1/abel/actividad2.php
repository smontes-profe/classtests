
<?php
    $nombre="";
    $papellido="";
    $sapellido="";
    $edad="";
    $email="";
    $año="";
    $movil="";

    if (isset($_GET["nombre"])) {
        $nombre = $_GET["nombre"];
    }
    if (isset($_GET["papellido"])) {
        $papellido = $_GET["papellido"];
    }
    if (isset($_GET["sapellido"])) {
        $sapellido = $_GET["sapellido"];
    }
    if (isset($_GET["edad"])) {
        $edad = $_GET["edad"];
    }
    if (isset($_GET["email"])) {
        $email = $_GET["email"];
    }
    if (isset($_GET["año"])) {
        $año = $_GET["año"];
    }
    if (isset($_GET["movil"])) {
        $movil = $_GET["movil"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2</title>
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

    <?php if ($nombre != ""): ?>
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