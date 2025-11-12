<?php
// Recibe por GET la variable "centro". Si es "Ilerna" redirige a la web de Ilerna.
$centro = isset($_GET['centro']) ? $_GET['centro'] : null;


if ($centro === 'Ilerna') {
    header('Location: https://www.ilerna.es');
    exit();
} else {
    // Mostramos una pagina HTML sencilla para el else
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <title>No Ilerna</title>
    </head>

    <body>
        <h1>Booooo! Fueraaaa!!!</h1>
        <p>Centro recibido: <?php echo htmlspecialchars($centro); ?></p>
        <p><a href="../html/index.html">Volver al formulario</a></p>
    </body>

    </html>
<?php
}
