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
    <title>Formulario</title>
</head>
<body>
    <h1>Introduce tu centro</h1>
    <form action="index.php" method="GET">
        <input type="text" name="centro" placeholder="Nombre del centro" required>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>