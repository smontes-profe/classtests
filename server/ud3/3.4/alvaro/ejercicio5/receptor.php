<?php
if (!isset($_COOKIE['centro'])) {
    header("Location: form.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 - Receptor Cookie</title>
</head>
<body>
<h1>Ejercicio 5 - Receptor</h1>
<p>Cookie centro: <?php echo htmlspecialchars($_COOKIE['centro']); ?></p>
<a href="../index.html">Volver al índice</a>
</body>
</html>
