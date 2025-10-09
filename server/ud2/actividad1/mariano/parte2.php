<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte2</title>
</head>
<body>
    <?php 
    $nombre = "Mariano";
    $apellido = "Verdugo";
    $apellido2 = "Gonzalez";
    $email = "chatomariano2006@gmail.com";
    $año = 2006;
    $movil = 633402201;
    ?>
    <table border="3">
        <th>
        Datos Alumno
            <td>
                <p>Nombre:</p>
            </td>
            <td>
                <p>Primer Apellido:</p>
            </td>
            <td>
                <p>Segundo Apellido:</p>
            </td>
            <td>
                <p>Email:</p>
            </td>
            <td>
                <p>Año de nacimiento:</p>
            </td>
            <td>
                <p>Teléfono</p>
            </td>
        </th>
       <tr>
            <th>
                1
            </th>
            <td>
                <p><?php echo $nombre; ?></p>
            </td>
            <td>
                <p><?php echo $apellido; ?></p>
            </td>
            <td>
                <p><?php echo $apellido2; ?></p>
            </td>
            <td>
                <p><?php echo $email; ?></p>
            </td>
            <td>
                <p><?php echo $año; ?></p>
            </td>
            <td>
                <p><?php echo $movil; ?></p>
            </td>
       </tr>
    </table>
</body>
</html>