<?php

if (isset($_GET['centro']) && !empty($_GET['centro'])) {
    $centro = $_GET['centro'];

    // Crear la cookie "centro" con duración de 1 minuto
    setcookie('centro', $centro, time() + 60, '/');

    // Redirigir a receptor.php
    header('Location: receptor.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Centro</title>
</head>
<body>
    <h2>Introducir centro</h2>
    <form method="get" action="form.php">
        <label for="centro">Centro:</label>
        <input type="text" id="centro" name="centro" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
