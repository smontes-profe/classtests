<?php
// Evitar que el navegador o proxies almacenen la página en caché

// 1️ Indica que el contenido ha expirado ya
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");

// 2️ Indica que la página fue modificada justo ahora
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

// 3️ Indica que no se debe guardar en caché (HTTP/1.1 y HTTP/1.0)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Contenido de prueba
echo "<h1>Esta página no se almacena en caché </h1>";
echo "<p>Fecha actual del servidor: " . date("H:i:s") . "</p>";
?>
