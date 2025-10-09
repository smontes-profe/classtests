<!-- 5. parte5.php: A partir de una cantidad de dinero, mostrar su descomposición en billetes (500, 200, 100, 50, 20, 10, 5) y monedas (2, 1),

para que el número de elementos sea mínimo. 
No se debe utilizar ninguna instrucción condicional. 
Por ejemplo, al introducir 138 debe mostrar: 1 billete de 100, 0 billetes de 50, 1 billete de 20, 1 billete de 10, 1 billete de 5, 1 moneda de 2, 2 monedas de 1, 
Tip: Puedes forzar a realizar la división entera mediante la función intdiv($dividendo, $divisor) o pasar un número flotante a entero puedes usar la función intval(). //3 PUNTOS. -->


<?php
$cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : 0;

$valores = [500, 200, 100, 50, 20, 10, 5, 2, 1];

$resultado = [];


/*
Recorremos cada billete/moneda en orden descendente.

Calculamos cuántos caben (intdiv) y guardamos ese número.

Actualizamos la cantidad restante (%) para la siguiente denominación.

Al final, $resultado contiene la descomposición mínima en billetes y monedas.
*/

// Descomposición de la cantidad
$c = $cantidad; // copia para no perder el valor original
foreach ($valores as $v) {
    $num = intdiv($c, $v);
    $resultado[$v] = $num;
    $c = $c % $v;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Descomposición de dinero</title>
</head>
<body>
    <h2>Descomposición de la cantidad</h2>

    <form action="" method="get">
        <label for="cantidad">Introduce la cantidad: </label>
        <input type="number" id="cantidad" name="cantidad" min="1" value="<?php echo $cantidad; ?>" required>
        <input type="submit" value="Calcular">
    </form>

    <?php if ($cantidad > 0): ?>
        <p>Cantidad introducida: <strong><?php echo $cantidad; ?> €</strong></p>
        <ul>
            <?php foreach ($resultado as $valor => $cantidadBilletes): ?>
                <?php $tipo = $valor >= 5 ? "billete" : "moneda"; ?>
                <li><?php echo $cantidadBilletes . " " . $tipo . ($cantidadBilletes != 1 ? "s" : "") . " de " . $valor . " €"; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>


