<?php
// Get amount from URL
$amount = isset($_GET['amount']) ? (int)$_GET['amount'] : 0;

// Denominations
$denominations = [500, 200, 100, 50, 20, 10, 5, 2, 1];

// Array to store counts
$counts = [];

// Calculate number of each bill/coin
$originalAmount = $amount; // store original for display
foreach($denominations as $d) {
    $counts[$d] = intdiv($amount, $d);
    $amount -= $counts[$d] * $d;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parte 5</title>
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
            max-width: 600px;
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
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <button onclick="window.location.href='http://localhost/Ud2Fundamentos/'">Back</button>

   <h3>5. parte5.php: <br>
    A partir de una cantidad de dinero, mostrar su descomposición en billetes (500, 200, 100, 50, 20, 10, 5) y monedas (2, 1),<br>
    para que el número de elementos sea mínimo. No se debe utilizar ninguna instrucción condicional. Por ejemplo,<br>
    al introducir 138 debe mostrar: 1 billete de 100, 0 billetes de 50, 1 billete de 20, 1 billete de 10, 1 billete de 5,<br>
    1 moneda de 2, 2 monedas de 1, Tip: Puedes forzar a realizar la división entera mediante la función intdiv($dividendo, $divisor) <br>
    o pasar un número flotante a entero puedes usar la función intval(). //3 PUNTOS.</h3>

<?php if(isset($_GET['amount'])): ?>
    <h3>Decomposition for <?= $originalAmount ?>:</h3>
    <table>
        <tr>
            <th>Denomination</th>
            <th>Count</th>
        </tr>
        <?php foreach($counts as $den => $count): ?>
        <tr>
            <td><?= $den ?><?= $den >= 5 ? ' bill' : ' coin' ?></td>
            <td><?= $count ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Please provide an amount in the URL, e.g., <code>parte5.php?amount=138</code></p>
<?php endif; ?>

</body>
</html>
