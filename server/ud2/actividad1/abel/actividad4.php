<?php
    $edad = isset($_GET['edad']) && is_numeric($_GET['edad']) ? (int)$_GET['edad'] : 33;
    $añoactual=date("Y");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 4</title>
</head>
<body>
    <p>Dentro de 10 años tendrás <?= $edad + 10 ?> años (año <?= $añoactual + 10 ?>)</p>
    <p>Hace 10 años tenías <?= $edad - 10 ?> años (año <?= $añoactual - 10 ?>)</p>
    <p>Año estimado de jubilación: <?= $añoactual + (67 - $edad) ?> (cuando cumplas 67 años)</p>
</body>
</html>

