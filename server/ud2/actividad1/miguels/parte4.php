<?php

$edad = -33;
$anyoActual = date("Y");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Parte 4</title>
</head>

<body>
    <header>
        <h1>Parte 4</h1>
    </header>
    <main>
        <?php if ($edad === null): ?>
            <p>Indica la edad por URL, por ejemplo: <code>parte4.php?edad=33</code></p>
        <?php elseif ($edad === false): ?>
            <p>La edad indicada no es válida. Debe ser un entero entre 0 y 130.</p>
        <?php else: ?>
            <?php
            $edadMas10  = $edad + 10;
            $edadMenos10 = max(0, $edad - 10);

            $anyoMas10  = $anyoActual + 10;
            $anyoMenos10 = $anyoActual - 10;

            $edadJubilacion = 67;

            if ($edad < $edadJubilacion) {
                $aniosRestantes = $edadJubilacion - $edad;
                $anyoJubilacion = $anyoActual + $aniosRestantes;
                $textoJubi = "Te jubilarás (a los $edadJubilacion años) en el año $anyoJubilacion (faltan $aniosRestantes años).";
            } elseif ($edad === $edadJubilacion) {
                $anyoJubilacion = $anyoActual;
                $textoJubi = "Este año ($anyoActual) cumples $edadJubilacion: sería tu año de jubilación.";
            } else {
                $aniosPasados = $edad - $edadJubilacion;
                $anyoJubilacion = $anyoActual - $aniosPasados;
                $textoJubi = "Te jubilaste (a los $edadJubilacion) en el año $anyoJubilacion (hace $aniosPasados años).";
            }
            ?>
            <p>Edad actual: <strong><?= $edad ?></strong> años. Año actual: <strong><?= $anyoActual ?></strong>.</p>
            <p>Dentro de 10 años tendrás <strong><?= $edadMas10 ?></strong> años. Será el año <strong><?= $anyoMas10 ?></strong>.</p>
            <p>Hace 10 años tenías <strong><?= $edadMenos10 ?></strong> años. Era el año <strong><?= $anyoMenos10 ?></strong>.</p>
            <p><?= $textoJubi ?></p>
        <?php endif; ?>
    </main>
</body>

</html>