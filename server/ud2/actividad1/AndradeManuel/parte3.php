<?php
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$apellido1 = isset($_GET['apellido1']) ? $_GET['apellido1'] : '';
$apellido2 = isset($_GET['apellido2']) ? $_GET['apellido2'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$anioNacimiento = isset($_GET['anioNacimiento']) ? $_GET['anioNacimiento'] : '';
$movil = isset($_GET['movil']) ? $_GET['movil'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Parte 3</title>
      <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: left;
        }
        caption {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>

<?php if ($nombre || $apellido1 || $apellido2 || $email || $anioNacimiento || $movil): ?>
    <table>
        <caption>Datos Recibidos</caption>
        <tr>
            <th>Nombre</th>
            <td><?php echo htmlspecialchars($nombre) ?></td>
        </tr>
        <tr>
            <th>Primer Apellido</th>
            <td><?php echo htmlspecialchars($apellido1) ?></td>
        </tr>
        <tr>
            <th>Segundo Apellido</th>
            <td><?php echo htmlspecialchars($apellido2) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($email) ?></td>
        </tr>
        <tr>
            <th>Año de Nacimiento</th>
            <td><?php echo htmlspecialchars($anioNacimiento) ?></td>
        </tr>
        <tr>
            <th>Móvil</th>
            <td><?php echo htmlspecialchars($movil) ?></td>
        </tr>
    </table>
<?php endif; ?>

</body>
</html>