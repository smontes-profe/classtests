<?php
// Si existe la cookie 'centro' la muestra y luego la elimina.
// Si no existe, redirige al formulario.

// Forzamos cabecera HTML
header('Content-Type: text/html; charset=utf-8');

if (isset($_COOKIE['centro'])) {
    // Tomamos el valor seguro para impresión
    $valor = htmlspecialchars($_COOKIE['centro'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // Mostramos la cookie y la eliminación en la misma petición
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Receptor - Ejercicio 6</title>
    </head>

    <body>
        <main>
            <h1>Receptor (Ejercicio 6)</h1>

            <p>Se ha detectado la cookie <code>centro</code> con valor:</p>
            <p><strong><?php echo $valor; ?></strong></p>

            <p>Ahora vamos a eliminarla (se envía una cookie con tiempo pasado).</p>

            <?php
            // Borrar la cookie: establecer con fecha pasada y mismo path
            setcookie('centro', '', time() - 3600, '/');
            // También borrarla del array superglobal para la petición actual
            unset($_COOKIE['centro']);
            ?>

            <p>La cookie ha sido eliminada del navegador (si las cabeceras se aceptan). Si recargas esta página ahora, como la cookie ya no existe, serás redirigido al formulario.</p>

            <p>
                <a href="../html/form.html">Volver al formulario</a> |
                <a href="form.php?centro=<?php echo urlencode($valor); ?>">Volver a crear la cookie (1 min)</a>
            </p>
        </main>
    </body>

    </html>
<?php
    exit();
} else {
    // No existe -> redirigir al formulario
    header('Location: ../html/form.html');
    exit();
}
