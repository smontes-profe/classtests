<?php
// receptor.php
// Comprueba la existencia de la cookie 'centro'. Si está, la muestra; si no, redirige a form.php

if (!isset($_COOKIE['centro'])) {
    // Cookie no presente: redirigir al formulario
    header('Location: form.php');
    exit;
}

$valor = $_COOKIE['centro'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptor - Cookie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Receptor</h1>
        <p>La cookie <code>centro</code> está presente en esta petición:</p>

        <div class="result">
            <p class="ok">Valor de la cookie <strong><?php echo htmlspecialchars($valor); ?></strong></p>
        </div>

        <div class="note">Si esperas más de 1 minuto desde su creación y refrescas, la cookie habrá expirado y serás redirigido al formulario.</div>

        <div class="actions">
            <a class="button" href="form.php">Volver al Formulario</a>
            <a class="button secondary" href="index.html">Inicio</a>
        </div>
    </div>
</body>
</html>
