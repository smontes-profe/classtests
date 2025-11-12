<?php 
$center = $_GET["center"] ?? "default";

if ($center == "Ilerna") {
    header("Location: https://www.ilerna.com/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej1</title>
</head>
<body>
    <form action="index.php" method="GET">
        <input type="text" name="center" placeholder="Introduce tu centro">
        <input type="submit" value="Enviar">
    </form>
    
    <?php if ($center != "default" && $center != "Ilerna"): ?>
        <p style="color: red;">Centro no reconocido.</p>
    <?php endif; ?>
</body>
</html>