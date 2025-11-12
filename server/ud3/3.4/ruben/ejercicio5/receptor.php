<?php
if (!isset($_COOKIE['centro'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Receptor</title>
</head>
<body>
    <h1>Cookie recibida</h1>
    <p>Centro: <?php echo $_COOKIE['centro']; ?></p>
    <p>Espera 1 minuto y recarga para ver la expiración</p>
    <button onclick="location.reload()">Recargar</button>
</body>
</html>