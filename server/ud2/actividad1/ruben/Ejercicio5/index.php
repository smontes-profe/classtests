<?php
/*5. parte5.php: A partir de una cantidad de dinero, mostrar su descomposición 
en billetes (500, 200, 100, 50, 20, 10, 5) y monedas (2, 1),

para que el número de elementos sea mínimo. No se debe utilizar ninguna 
instrucción condicional. Por ejemplo, al introducir 138 debe mostrar: 1 
billete de 100, 0 billetes de 50, 1 billete de 20, 1 billete de 10, 1 billete 
de 5, 1 moneda de 2, 2 monedas de 1, Tip: Puedes forzar a realizar la división 
entera mediante la función intdiv($dividendo, $divisor) o pasar un número 
flotante a entero puedes usar la función intval().*/ 

$dinero = $_GET["dinero"] ?? 0; // Si no se pasa valor, será 0

$billetes500 = intdiv($dinero, 500); $dinero %= 500;
$billetes200 = intdiv($dinero, 200); $dinero %= 200;
$billetes100 = intdiv($dinero, 100); $dinero %= 100;
$billetes50  = intdiv($dinero, 50);  $dinero %= 50;
$billetes20  = intdiv($dinero, 20);  $dinero %= 20;
$billetes10  = intdiv($dinero, 10);  $dinero %= 10;
$billetes5   = intdiv($dinero, 5);   $dinero %= 5;
$monedas2    = intdiv($dinero, 2);   $dinero %= 2;
$monedas1    = $dinero; // lo que queda son monedas de 1
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Descomposición de dinero</title>
</head>
<body>
    <h2>Descomposición del dinero</h2>
    <ul>
        <li><?= $billetes500 ?> billetes de 500</li>
        <li><?= $billetes200 ?> billetes de 200</li>
        <li><?= $billetes100 ?> billetes de 100</li>
        <li><?= $billetes50 ?> billetes de 50</li>
        <li><?= $billetes20 ?> billetes de 20</li>
        <li><?= $billetes10 ?> billetes de 10</li>
        <li><?= $billetes5 ?> billetes de 5</li>
        <li><?= $monedas2 ?> monedas de 2</li>
        <li><?= $monedas1 ?> monedas de 1</li>
    </ul>
</body>
</html>

