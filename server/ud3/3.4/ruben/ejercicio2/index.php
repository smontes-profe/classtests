<?php
// 1. Cache-Control: Indica al navegador y proxies que NO guarden caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

// 2. Expires: Fecha de expiración en el pasado (fuerza a renovar)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// 3. Pragma: Compatibilidad con navegadores antiguos
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página sin caché</title>
</head>
<body>
    <h1>Esta página NO se guarda en caché</h1>
    <p>Hora actual del servidor: <?php echo date('H:i:s'); ?></p>
    <p>Cada vez que recargues, verás una hora diferente porque se pide al servidor.</p>
</body>
</html>