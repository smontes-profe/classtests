<?php
$cantidad = isset($_GET["cantidad"]) ? intval($_GET["cantidad"]) : 0;

if ($cantidad <= 0) {
    echo "<p>Introduce una cantidad válida en la URL (por ejemplo: ?cantidad=138).</p>";
    exit;
}

$billetes = [500, 200, 100, 50, 20, 10, 5, 2, 1];

echo "<h2>Descomposición de $cantidad €</h2>";

foreach ($billetes as $valor) {
  $num = intdiv($cantidad, $valor);
  $cantidad = $cantidad % $valor;
  echo "$num ";
  echo ($valor >= 5) ? "billete" : "moneda";
  echo " de $valor €<br>";
}