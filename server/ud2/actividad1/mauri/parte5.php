<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Parte 5</title>
    <style>
        td,th{border:1px solid #333;padding:6px}
    </style>
</head>
<body>
<?php
$cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : null;

$denominaciones = [500,200,100,50,20,10,5,2,1];
$resto = $cantidad;
$result = [];

foreach ($denominaciones as $d) {
    // número de billetes/monedas de esta denominación
    $n = intdiv($resto, $d);
    $result[$d] = $n;
    $resto = $resto - $n * $d;
}

echo "<h2>Cantidad: $cantidad €</h2>";
echo "<table><tr><th>Denominación</th><th>Cantidad</th></tr>";
foreach ($result as $den => $cant) {
    $tipo = $den >= 5 ? 'Billetes' : 'Monedas';
    echo "<tr><td>$den € ($tipo)</td><td>$cant</td></tr>";
}
echo "</table>";
?>
</body>
</html>