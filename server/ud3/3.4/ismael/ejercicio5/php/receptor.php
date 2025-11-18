<?php
// Comprueba si existe la cookie 'centro'. Si existe, la muestra.
// Si no existe, redirige al formulario.

// Aseguramos cabecera HTML
header('Content-Type: text/html; charset=utf-8');

if (isset($_COOKIE['centro'])) {
    // Mostramos un HTML sencillo con el valor
    $valor = htmlspecialchars($_COOKIE['centro'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Receptor - Ejercicio 5</title>
    </head>

    <body>
        <main>
            <h1>Cookie recibida</h1>
            <p>La cookie <code>centro</code> existe y su valor es: <strong><?php echo $valor; ?></strong></p>
            <p>Nota: la cookie expirará 1 minuto después de ser creada. Si esperas más de 60s y recargas, ya no existirá y serás redirigido al formulario.</p>
            <p>
                <a href="../html/form.html">Volver al formulario</a> |
                <a href="form.php?centro=<?php echo urlencode($valor); ?>">Re-guardar y redirigir (guardará 1 min más)</a>
            </p>
        </main>
    </body>

    </html>
<?php
    exit();
} else {
    // Si no existe la cookie, redirigimos al formulario
    header('Location: ../html/form.html');
    exit();
}
