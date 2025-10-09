<!--
5. parte5.php:
 A partir de una cantidad de dinero, mostrar su descomposición en billetes (500, 200, 100, 50, 20, 10, 5) y monedas (2, 1),
 para que el número de elementos sea mínimo.
 No se debe utilizar ninguna instrucción condicional.
 Por ejemplo, al introducir 138 debe mostrar: 
 1 billete de 100, 0 billetes de 50, 1 billete de 20, 1 billete de 10, 1 billete de 5, 1 moneda de 2, 2 monedas de 1, 
 Tip: Puedes forzar a realizar la división entera mediante la función intdiv($dividendo, $divisor) 
 o pasar un número flotante a entero puedes usar la función intval(). //3 PUNTOS.

-->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parte5</title>
 </head>
 <body>
    <form method="GET">
        <label for="cantidad">Cantidad de dinero:</label>
        <input type="number" id="cantidad" name="cantidad" required>
        <input type="submit" value="Calcular Descomposición">
    </form>



    <?php

    if (isset($_GET['cantidad'])) {
        
        $cantidad = intval($_GET['cantidad']);

        $billetes500 = intdiv($cantidad, 500);
        $cantidad %= 500;

        $billetes200 = intdiv($cantidad, 200);
        $cantidad %= 200;

        $billetes100 = intdiv($cantidad, 100);
        $cantidad %= 100;

        $billetes50 = intdiv($cantidad, 50);
        $cantidad %= 50;

        $billetes20 = intdiv($cantidad, 20);
        $cantidad %= 20;

        $billetes10 = intdiv($cantidad, 10);
        $cantidad %= 10;

        $billetes5 = intdiv($cantidad, 5);
        $cantidad %= 5;

        $monedas2 = intdiv($cantidad, 2);
        $cantidad %= 2;

        $monedas1 = $cantidad; 

        echo "<h2>Descomposición de la cantidad:</h2>";
        
        echo "<ul>";
        echo "<li>$billetes500 billetes de 500</li>";
        echo "<li>$billetes200 billetes de 200</li>";
        echo "<li>$billetes100 billetes de 100</li>";
        echo "<li>$billetes50 billetes de 50</li>";
        echo "<li>$billetes20 billetes de 20</li>";
        echo "<li>$billetes10 billetes de 10</li>";
        echo "<li>$billetes5 billetes de 5</li>";
        echo "<li>$monedas2 monedas de 2</li>";
        echo "<li>$monedas1 monedas de 1</li>";
        
    }
    ?>


 </body>
 </html>