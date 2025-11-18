<?php
// Muestra el contenido de $_COOKIE con var_dump() y luego el valor de la cookie 'centro'.

// Forzamos cabecera HTML para evitar problemas de interpretación por el navegador
header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Leer cookie</title>
</head>

<body>
    <h1>Contenido de <code>$_COOKIE</code></h1>

    <p>Salida de <code>var_dump($_COOKIE)</code>:</p>
    <pre><?php var_dump($_COOKIE); ?></pre>

    <h2>Valor específico de la cookie <code>'centro'</code></h2>
    <p>
        <?php
        if (isset($_COOKIE['centro'])) {
            // htmlspecialchars para evitar inyección HTML
            echo 'La cookie <code>centro</code> existe y su valor es: <strong>' . htmlspecialchars($_COOKIE['centro']) . '</strong>';
        } else {
            echo 'La cookie <code>centro</code> NO está definida (aún o ha expirado).';
        }
        ?>
    </p>

    <p>
        <a href="../html/index.html">Volver</a> |
        <a href="../../ejercicio3/php/crear_cookie.php">Crear cookie 'centro' (Ej3)</a>
    </p>
</body>

</html>