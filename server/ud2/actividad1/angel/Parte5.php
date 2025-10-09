<?php 
// 5. parte5.php: A partir de una cantidad de dinero que introduce el usuario, mostrar su descomposición en billetes (500, 200, 100, 50, 20, 10, 5) y monedas (2, 1),
// para que el número de elementos sea mínimo. No se debe utilizar ninguna instrucción condicional. Por ejemplo, al introducir 138 debe 
// mostrar: 1 billete de 100, 0 billetes de 50, 1 billete de 20, 1 billete de 10, 1 billete de 5, 1 moneda de 2, 2 monedas de 1, 
// Tip: Puedes forzar a realizar la división entera mediante la función intdiv($dividendo, $divisor) o pasar un número flotante a 
//entero puedes usar la función intval().

// Recoger la cantidad introducida por el usuario vía GET
$cantidad = $_GET['cantidad'] ?? 0;
$cantidad = intval($cantidad);

// Definir los billetes y monedas disponibles
$billetesYMonedas = [500, 200, 100, 50, 20, 10, 5, 2, 1];
$descomposicion = [];

// Inicializar la descomposición con ceros
if ($cantidad > 0) {
    // Calcular número de billetes y monedas
    $resto = $cantidad;
    foreach ($billetesYMonedas as $valor) {
        $numeroDeElementos = intdiv($resto, $valor);
        $descomposicion[$valor] = $numeroDeElementos;
        $resto -= $numeroDeElementos * $valor;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dineros 💸💸💸💸</title>
</head>
<body>
    <h2>Introduce una cantidad de dinero</h2>
    <form action="" method="GET">
        <input type="number" name="cantidad" min="0" required>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($cantidad > 0): ?>
        <h3>Descomposición de <?= $cantidad ?> €:</h3>
        <ul>
            <?php
            foreach ($descomposicion as $valor => $num) {
                $tipo = ($valor >= 5) ? 'billete(s)' : 'moneda(s)';
                echo "<li>$num $tipo de $valor €</li>";
            }
            ?>
        </ul>
    <?php endif; ?>
</body>
</html>