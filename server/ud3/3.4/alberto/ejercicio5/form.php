<?php
if (isset($_GET['centro']) && !empty($_GET['centro'])) {
    $nuevo_centro = htmlspecialchars($_GET['centro']);
    $expiracion = time() + 60;

    //utilizo "/" en el ultimo parametro para indicar que está disponible en todo eldominio
    setcookie("centro", $nuevo_centro, $expiracion, "/"); 
    
    header('Location: receptor.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Formulario</title></head>
<body>
    <h1>IEscritura de una Cookie</h1>
    <p>La cookie se guardará por 1 minuto.</p>
    <form method="get" action="form.php">
        <label for="centro">Centro:</label>
        <input type="text" id="centro" name="centro" required>
        <button type="submit">Guardar en Cookie y Redirigir</button>
    </form>
</body>
</html>
