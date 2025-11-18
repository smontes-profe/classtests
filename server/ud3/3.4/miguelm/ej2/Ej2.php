<?php
// Cabeceras para impedir el almacenamiento en caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

echo "Contenido sin caché - Hora del servidor: " . date('H:i:s');
?>