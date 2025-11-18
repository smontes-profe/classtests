<?php
if (isset($_GET['centro'])) {
    setcookie("centro", $_GET['centro'], time() + 60);
    header("Location: receptor.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 - Formulario Cookie</title>
</head>
<body>
<h1>Ejercicio 5 - Formulario</h1>
<form method="get" action="form.php">
    <label>Centro:</label>
    <input type="text" name="centro" required>
    <button type="submit">Enviar</button>
</form>
<a href="../index.html">Volver al índice</a>
</body>
</html>
