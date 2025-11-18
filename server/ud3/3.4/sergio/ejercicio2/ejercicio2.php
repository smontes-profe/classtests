<?php

//Evito que la pagina se almacene  en el cache en el navegador
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Evitar Caché</title></head>
<body>
<h2>Esta página no se almacena en caché.</h2>
<p>Refresca y observa que siempre se vuelve a cargar desde el servidor.</p>
</body>
</html>