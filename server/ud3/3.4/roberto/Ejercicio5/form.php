<?php
// Si se recibe el valor de "centro" por GET
if (isset($_GET['centro'])) {
    $centro = $_GET['centro'];

    // Crear la cookie "centro" con duración de 1 minuto
    setcookie("centro", $centro, time() + 60);

    // Redirigir a receptor.php
    header("Location: receptor.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario - Crear cookie</title>
</head>
<body>
    <h1>Formulario de creación de cookie</h1>
    <form action="form.php" method="get">
        <label for="centro">Nombre del centro:</label>
        <input type="text" id="centro" name="centro" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
