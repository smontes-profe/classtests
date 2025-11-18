<?php
// receptor.php
// Comprueba la existencia de la cookie 'centro'. Si está, la muestra y la borra; si no, redirige a form.php

if (!isset($_COOKIE['centro'])) {
    // Cookie no presente: redirigir al formulario
    header('Location: form.php');
    exit;
}

$valor = $_COOKIE['centro'];
// Borrar la cookie estableciendo una fecha de expiración en el pasado
setcookie('centro', '', time() - 3600, '/');

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
        <p>La cookie <code>centro</code> está presente y será eliminada:</p>

        <div class="result">
            <p class="ok">Valor de la cookie: <strong><?php echo htmlspecialchars($valor); ?></strong></p>
            <p>La cookie ha sido eliminada.</p>
        </div>

        <div class="note">Al recargar esta página serás redirigido al formulario ya que la cookie ha sido borrada.</div>

        <div class="actions">
            <a class="button" href="receptor.php">Recargar página</a>
            <a class="button secondary" href="form.php">Volver al Formulario</a>
            <a class="button secondary" href="index.html">Inicio</a>
        </div>
    </div>
</body>
</html>