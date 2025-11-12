<?php
setcookie(
    "centro",        
    "Ilerna",       
    [
        "expires" => time() + 30,  
        "path" => "/",             
        "secure" => false,         
        "httponly" => true,        
        "samesite" => "Lax"        
    ]
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Crear Cookie</title>
</head>
<body>
<h1>Ejercicio 3 - Crear Cookie</h1>
<p>Cookie "centro" creada con valor "Ilerna". Expira en 30 segundos.</p>

<h2>Contenido de $_COOKIE</h2>
<pre><?php var_dump($_COOKIE); ?></pre>

<a href="../index.html">Volver al índice</a>
</body>
</html>
