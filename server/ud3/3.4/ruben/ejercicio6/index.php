<?php
if (!isset($_COOKIE['centro'])) {
    header("Location: http://localhost/ud3_2/ejercicio5/index.php");
    exit();
}

// Guardar el valor antes de borrar
$centro_valor = $_COOKIE['centro'];

// Borrar la cookie (establecer tiempo en el pasado)
setcookie("centro", "", time() - 3600);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Receptor</title>
</head>
<body>
    <h1>Cookie recibida</h1>
    <p>Centro: <?php echo $centro_valor; ?></p>
    <p><strong>Cookie borrada.</strong> Si recargas, serás redirigido al formulario.</p>
    <button onclick="location.reload()">Recargar</button>
</body>
</html>