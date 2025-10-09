<?php

$nombre = "Miguel";
$apellidoPrimero = "Sanchez";
$apellidoSegundo = "Vazquez";
$email = "migue.626@gmail.com";
$anoNacimiento = 1990;
$telefonoMovil = 622711002;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 2</title>
</head>

<body>

    <header>
        <h1>Tabla de resultados</h1>
    </header>

    <main>
        <table>
            <th>Lista de varialbes</th>
            <tr>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Correo</th>
                <th>Año nacimiento</th>
                <th>Teléfono</th>
            </tr>
            <tr>
                <th><?= $nombre ?></th>
                <th><?= $apellidoPrimero ?></th>
                <th><?= $apellidoSegundo ?></th>
                <th><?= $email ?></th>
                <th><?= $anoNacimiento ?></th>
                <th><?= $telefonoMovil?></th>
            </tr>
        </table>
    </main>

    <footer></footer>

</body>

</html>