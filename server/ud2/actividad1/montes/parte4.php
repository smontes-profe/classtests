<?php
$age = -33;
$anyoActual = date("Y"); // Año actual

// Edades
$ageFuture = $age + 10;
$agePast = $age - 10;

// Años correspondientes
$anyoFuture = $anyoActual + 10;   // dentro de 10 años
$anyoPast = $anyoActual - 10;     // hace 10 años

// Año de jubilación (67 años)
$edadJubilacion = 67;
$anyoJubilacion = $anyoActual + ($edadJubilacion - $age);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edad y Jubilación</title>  
</head>
<body>
    <h1>Edad y años relacionados</h1>
    <table>
        <tr>
            <th>Situación</th>
            <th>Edad</th>
            <th>Año</th>
        </tr>
        <tr>
            <td>Hace 10 años</td>
            <td><?= $agePast ?></td>
            <td><?= $anyoPast ?></td>
        </tr>
        <tr>
            <td>Ahora</td>
            <td><?= $age ?></td>
            <td><?= $anyoActual ?></td>
        </tr>
        <tr>
            <td>Dentro de 10 años</td>
            <td><?= $ageFuture ?></td>
            <td><?= $anyoFuture ?></td>
        </tr>
        <tr>
            <td>Jubilación (67 años)</td>
            <td><?= $edadJubilacion ?></td>
            <td><?= $anyoJubilacion ?></td>
        </tr>
    </table>
</body>
</html>