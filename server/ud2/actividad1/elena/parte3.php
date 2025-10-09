
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 3</title>
</head>

<body>

    <?php

        if($nombre !=="|| $primerApellido !=="|| $segundoApellido !=="|| $email !=="|| $anioNacimiento !=="|| $movil !==")

        $nombre = $_GET['nombre'];
        $primerApellido = $_GET['primerApellido'];
        $segundoApellido = $_GET['segundoApellido'];
        $email = $_GET['email'];
        $anioNacimiento = $_GET['anioNacimiento'];
        $movil = $_GET['movil'];
    ?>

        <table>
            <caption>Mis datos</caption>
            <tr>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Email</th>
                <th>Año nacimiento</th>
                <th>Móvil</th>
            </tr>
            <tr>
                <td><?php echo ($nombre); ?></td>
                <td><?php echo ($primerApellido); ?></td>
                <td><?php echo ($segundoApellido); ?></td>
                <td><?php echo ($email); ?></td>
                <td><?php echo ($anioNacimiento); ?></td>
                <td><?php echo ($movil); ?></td>
            </tr>
        </table>

</body>
</html>


