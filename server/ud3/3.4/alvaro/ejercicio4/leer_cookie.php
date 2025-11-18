<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 - Leer Cookie</title>
</head>
<body>
<h1>Ejercicio 4 - Leer Cookie</h1>

<h2>Contenido de $_COOKIE</h2>
<pre><?php var_dump($_COOKIE); ?></pre>

<h2>Valor de la cookie "centro"</h2>
<p>
<?php
if (isset($_COOKIE['centro'])) {
    echo htmlspecialchars($_COOKIE['centro']);
} else {
    echo "La cookie 'centro' no existe.";
}
?>
</p>

<a href="../index.html">Volver al índice</a>
</body>
</html>
