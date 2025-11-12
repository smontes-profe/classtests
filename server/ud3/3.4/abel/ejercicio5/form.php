<?php
if (isset($_GET['centro'])) {
    $valor = $_GET['centro'];

    setcookie("centro", $valor, time() + 60);

    header("Location: receptor.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Centro</title>
</head>
<body>
    <h2>Introduce el valor del centro:</h2>
    <form method="get" action="form.php">
        <input type="text" name="centro" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
