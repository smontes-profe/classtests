<?php
//Fecha de expiración en el pasado
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");

//Fecha de última modificación (actual)
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

//Instrucciones para evitar el almacenamiento en caché
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>