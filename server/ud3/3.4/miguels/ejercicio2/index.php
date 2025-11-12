<?php

header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Expires: Thu, 19 Nov 1981 08:52:00 GMT');

$pageTitle = "Página sin caché";
$mensaje = "Contenido que no se debe cachear";

include 'views/no_cache.php';