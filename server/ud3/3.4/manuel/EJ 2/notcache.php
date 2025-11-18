<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

echo "<h1>Esta página no se almacena en caché </h1>";
echo "<p>Hora actual del servidor: " . date("H:i:s") . "</p>";
?>