<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Evitar Caché</title>
</head>
<body>
<h1>Ejercicio 2 - Evitar Caché</h1>
<p>Esta página no se almacena en caché.</p>
<a href="../index.html">Volver al índice</a>
</body>
</html>
