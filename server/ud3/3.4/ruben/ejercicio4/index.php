<?php
// Crear cookie
setcookie("centro", "Ilerna", time() + 30);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lectura Cookie</title>
</head>
<body>
    <h1>Lectura de Cookie</h1>
    
    <h2>Contenido completo de $_COOKIE:</h2>
    <pre><?php var_dump($_COOKIE); ?></pre>
    
    <h2>Valor de la cookie "centro":</h2>
    <?php
    if (isset($_COOKIE['centro'])) {
        echo "Valor: " . $_COOKIE['centro'];
    } else {
        echo "Cookie no existe (recarga la página)";
    }
    ?>
    
    <br><br>
    <button onclick="location.reload()">Recargar</button>
</body>
</html>