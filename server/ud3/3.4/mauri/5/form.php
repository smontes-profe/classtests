<?php
// form.php
// Si llega 'centro' via GET, lo guarda en la cookie por 60 segundos y redirige a receptor.php

$ttl = 60; // 1 minuto

if (isset($_GET['centro'])) {
    $value = (string)$_GET['centro'];
    // Establecer cookie 'centro' por 60 segundos
    setcookie('centro', $value, time() + $ttl, '/');
    // Redirigir a receptor.php para que la siguiente petición incluya la cookie
    header('Location: receptor.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Escritura de Cookie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Formulario</h1>
        <p>Introduce el valor para la cookie <code>centro</code>. El formulario envía por GET a sí mismo.</p>

        <form method="get" action="form.php">
            <label for="centro">Centro:</label>
            <input id="centro" name="centro" type="text" required placeholder="Ilerna">
            <div class="actions">
                <button class="button" type="submit">Enviar y Guardar en Cookie (1 min)</button>
                <a class="button secondary" href="index.html">Volver</a>
            </div>
        </form>

        <div class="note">Si accedes manualmente con <code>?centro=valor</code> en la URL también funcionará. Después de enviar serás redirigido a <code>receptor.php</code>.</div>
    </div>
</body>
</html>
