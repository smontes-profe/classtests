<?php
// Cantidad a descomponer
$dinero = isset($_GET['cantidad']) ? (int) $_GET['cantidad'] : 154;

// Billetes y monedas disponibles
$billetes = [500, 200, 100, 50, 20, 10, 5];
$monedas = [2, 1];

echo "<h1>Descomposición de $dinero €</h1>";

// Descomposición en billetes
echo "<h2>Billetes</h2>";
foreach ($billetes as $b) {
    $num = intdiv($dinero, $b);   // número de billetes
    echo "$num billete(s) de $b €<br>";
    $dinero = $dinero % $b;       // resto
}

// Descomposición en monedas
echo "<h2>Monedas</h2>";
foreach ($monedas as $m) {
    $num = intdiv($dinero, $m);   // número de monedas
    echo "$num moneda(s) de $m €<br>";
    $dinero = $dinero % $m;       // resto
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Descomposición de dinero</h1>

    <form action="" method="get">
        <label>Introduce la cantidad (€):</label>
        <input type="number" name="cantidad" value="<?= htmlspecialchars($dinero) ?>" min="0" required>
        <button type="submit">Calcular</button>
    </form>
</body>

</html>