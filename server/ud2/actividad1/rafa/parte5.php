<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dinero</title>
</head>
<body>
    <form action="parte5.php" method="get">
        <label for="cantidad">Cantidad de dinero:</label>
        <input type="number" id="cantidad" name="cantidad" required>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>



<?php


$cantidad = $_GET['cantidad'] ?? 0; 
$cantidad = intval($cantidad);

$valores = [500, 200, 100, 50, 20, 10, 5, 2, 1];

foreach ($valores as $valor) {
    $num = intdiv($cantidad, $valor);
    echo "$num ";
    echo $valor >= 5 ? "billetes de $valor" : "monedas de $valor";
    echo "<br>";
    $cantidad = $cantidad % $valor;
}
?>