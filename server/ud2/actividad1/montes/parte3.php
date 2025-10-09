<?php
$name = $_GET['name'] ?? '';
$subname = $_GET['subname'] ?? '';
$subname2 = $_GET['subname2'] ?? '';
$email = $_GET['email'] ?? '';
$birthDate = $_GET['birthDate'] ?? '';
$phone = $_GET['phone'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>TABLA CON DATOS PERSONALES</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>1º Apellido</th>
            <th>2º Apellido</th>
            <th>Email</th>
            <th>Fecha de Nacimiento</th>
            <th>Teléfono</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($name) ?></td>
            <td><?= htmlspecialchars($subname) ?></td>
            <td><?= htmlspecialchars($subname2) ?></td>
            <td><?= htmlspecialchars($email) ?></td>
            <td><?= htmlspecialchars($birthDate) ?></td>
            <td><?= htmlspecialchars($phone) ?></td>
        </tr>
    </table>
</body>

</html>