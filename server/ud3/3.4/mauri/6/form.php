<?php
// form.php
// Si llega 'centro' via GET, lo guarda en la cookie por 1 hora y redirige a receptor.php

$ttl = 3600; // 1 hora

if (isset($_GET['centro'])) {
    $value = (string)$_GET['centro'];
    // Establecer cookie 'centro' por 1 hora
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
                <button class="button" type="submit">Enviar y Guardar en Cookie</button>
                <a class="button secondary" href="index.html">Volver</a>
            </div>
        </form>

        <div class="note">La cookie se creará y serás redirigido a <code>receptor.php</code> para ver y borrar la cookie.</div>
    </div>
</body>
</html>