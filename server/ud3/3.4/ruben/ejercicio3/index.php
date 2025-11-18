<?php
// Crear cookie que expira en 30 segundos
$nombre_cookie = "centro";
$valor_cookie = "Ilerna";
$expiracion = time() + 30; // time() = ahora, +30 segundos

setcookie($nombre_cookie, $valor_cookie, $expiracion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cookie Simple</title>
</head>
<body>
    <h1>Cookie Creada</h1>
    <p>Se ha creado una cookie llamada "centro" con el valor "Ilerna"</p>
    <p>Expirará en 30 segundos</p>
    
    <hr>
    
    <h2>Verificar cookie:</h2>
    <?php
    if (isset($_COOKIE['centro'])) {
        echo "<p style='color: green;'>✓ Cookie existe: " . $_COOKIE['centro'] . "</p>";
    } else {
        echo "<p style='color: red;'>✗ Cookie no existe o ya expiró</p>";
    }
    ?>
    
    <button onclick="location.reload()">Recargar página</button>
</body>
</html>