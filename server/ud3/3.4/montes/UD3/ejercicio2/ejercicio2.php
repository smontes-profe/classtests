<?php 

// Cabecera 1: Control moderno (HTTP 1.1)
header ("Cache-Control: no-store, no-cache, must-revalidate");

// Cabecera 2: Compatibilidad (Fecha de expiración en el pasado)
header("Expires: Mon, 1 Jan 1990 00:00:00 GMT");

//Cabecera 3: Compatibilidad (HTTP1.0)
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>¡Esta página NO DEBE ser almacenada en la caché!</h1>
    <p>El navegador debe solicitarla al servidor en cada visita gracias a las cabeceras HTTP.</p>
</body>
</html>