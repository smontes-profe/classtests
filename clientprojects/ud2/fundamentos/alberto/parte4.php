<?php
// Get age from URL
$edad = isset($_GET['edad']) ? (int)$_GET['edad'] : 0;

// Current year
$anyoActual = date("Y");

// Calculate ages and years
$edadMas10 = $edad + 10;
$anyoMas10 = $anyoActual + 10;

$edadMenos10 = $edad - 10;
$anyoMenos10 = $anyoActual - 10;

$edadJubilacion = 67;
$anyoJubilacion = $anyoActual + ($edadJubilacion - $edad);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parte 4</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 40px;
            color: #333;
        }
        h3 {
            color: #007bff;
        }
        table {
            width: 100%;
            max-width: 500px;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <button onclick="window.location.href='http://localhost/Ud2Fundamentos/'">Back</button>

   <h3>4. parte4.php: <br>
    Sabiendo la edad de una persona, mostrar la edad que tendrá dentro de 10 años y hace 10 años. Además, muestra qué <br>
    año será en cada uno de los casos. Finalmente, muestra el año de jubilación suponiendo que trabajarás hasta los 67 <br>
    años. En este caso, no hace falta que previamente crees un formulario, puedes probar el ejercicio directamente vía URL: <br>
    parte4.php?edad=33. Tip: $anyoActual = date("Y"); //2,5 PUNTOS.</h3>

    <?php if($edad > 0): ?>
        <table>
            <tr>
                <th>Concept</th>
                <th>Age / Year</th>
            </tr>
            <tr>
                <td>Current Age</td>
                <td><?= $edad ?> (<?= $anyoActual ?>)</td>
            </tr>
            <tr>
                <td>Age in 10 years</td>
                <td><?= $edadMas10 ?> (<?= $anyoMas10 ?>)</td>
            </tr>
            <tr>
                <td>Age 10 years ago</td>
                <td><?= $edadMenos10 ?> (<?= $anyoMenos10 ?>)</td>
            </tr>
            <tr>
                <td>Retirement at 67</td>
                <td><?= $edadJubilacion ?> (<?= $anyoJubilacion ?>)</td>
            </tr>
        </table>
    <?php elseif($edad < 0): ?>
        <p style='color:red;'>Please, insert a valid number.</p>
    <?php else: ?>
        <p>Please provide your age in the URL, e.g., <i>parte4.php?edad=33</i></p>
    <?php endif; ?>

</body>
</html>