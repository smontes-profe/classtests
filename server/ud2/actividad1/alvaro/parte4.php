<?php
$edad = isset($_GET["edad"]) ? intval($_GET["edad"]) : 0;

if ($edad <= 0) {
    echo "<p>Introduce una edad válida en la URL (por ejemplo: ?edad=33).</p>";
    exit;
}

$anyoActual = date("Y");

$edadFutura = $edad + 10;
$edadPasada = $edad - 10;

$anyoFuturo = $anyoActual + 10;
$anyoPasado = $anyoActual - 10;

$anyoNacimiento = $anyoActual - $edad;
$anyoJubilacion = $anyoNacimiento + 67;
?>

<p>Ahora tienes <?= $edad ?> años.</p>
<p>Dentro de 10 años tendrás <?= $edadFutura ?> años (en el año <?= $anyoFuturo ?>).</p>
<p>Hace 10 años tenías <?= $edadPasada ?> años (en el año <?= $anyoPasado ?>).</p>
<p>Te jubilarás en el año <?= $anyoJubilacion ?>.</p>