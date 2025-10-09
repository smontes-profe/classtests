<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Parte 4</title>
      <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: left;
        }
        caption {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
<?php
$edad = isset($_GET['edad']) ? (int)$_GET['edad'] : 0;
$anyoActual = date("Y");
if ($edad <= 0) {
    echo "Por favor, proporciona una edad válida en la URL";
    exit;
}
$edadFutura = $edad + 10;
$anyoFuturo = $anyoActual + 10;
$edadPasada = $edad - 10;
$anyoPasado = $anyoActual - 10;
$edadJubilacion = 67;
$anyojubilacion = $anyoActual + ($edadJubilacion - $edad);

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Edad y Jubilación</title>
</head>
<body>
<h2>Edad y cálculo de años</h2>
<p>Edad actual: <?= $edad ?> años</p>
<p>Dentro de 10 años tendrás <?= $edadFutura ?> años (en el año <?= $anyoFuturo ?>).</p>
<p>Hace 10 años tenías <?= $edadPasada >= 0 ? $edadPasada : "menos de 0 (edad no válida)" ?> años (en el año <?= $anyoPasado ?>).</p>
<p>Tu año de jubilación será en <?= $anyojubilacion ?>, cuando tengas <?= $edadJubilacion ?> años.</p>
</body>
</html>
