<?php

$cantidad = abs(intval($_GET['cantidad'] ?? 0));

$denominaciones = [500, 200, 100, 50, 20, 10, 5, 2, 1];

$etiquetas = [
    500 => 'billetes de 500',
    200 => 'billetes de 200',
    100 => 'billetes de 100',
    50 => 'billetes de 50',
    20 => 'billetes de 20',
    10 => 'billetes de 10',
    5 => 'billetes de 5',
    2 => 'monedas de 2',
    1 => 'monedas de 1'
];

$resto = $cantidad;
$resultado = [];

foreach ($denominaciones as $d) {
    $resultado[$d] = intdiv($resto, $d);
    $resto = $resto % $d;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Parte 5</title>
</head>

<body>
    <h1>Descomposición de una cantidad (€)</h1>

    <form action="parte5.php" method="GET">
        <label for="cantidad">Cantidad (entera): </label>
        <input type="number" name="cantidad" id="cantidad" min="0" step="1" value="<?php echo htmlspecialchars((string)$cantidad, ENT_QUOTES, 'UTF-8'); ?>">
        <button type="submit">Calcular</button>
    </form>

    <hr>

    <h2>Resultado para: <?php echo $cantidad; ?> €</h2>
    <ul>
        <?php foreach ($denominaciones as $d): ?>
            <li><?php echo $resultado[$d]; ?> <?php echo $etiquetas[$d]; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>