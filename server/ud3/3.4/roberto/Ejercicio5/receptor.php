





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Centro</title>
</head>
<body>
    <h1>Introduce el centro</h1>
    <form method="get" action="form.php">
        <input type="text" name="centro" placeholder="Nombre del centro">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
<?php
// Comprobamos si existe la cookie "centro"
if (isset($_COOKIE['centro'])) {
    $valor = $_COOKIE['centro'];
    echo "<h1>Cookie encontrada </h1>";
    echo "<p><strong>Valor de la cookie 'centro':</strong> $valor</p>";
    echo "<p>La cookie expirará automáticamente después de 1 minuto.</p>";
} else {
    // Si la cookie no existe o ha expirado, redirigimos al formulario
    header("Location: form.php");
    exit();
}
?>
