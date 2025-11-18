<?php
if (isset($_GET['centro']) && $_GET['centro'] === 'ilerna') {
    header("Location: https://www.ilerna.es");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Redirección HTTP</title>
</head>
<body>
<h1>Ejercicio 1 - Redirección</h1>
<p>
<?php
echo "Booooo! Fueraaaa!!!";
?>
</p>
<a href="../index.html">Volver al índice</a>
</body>
</html>
