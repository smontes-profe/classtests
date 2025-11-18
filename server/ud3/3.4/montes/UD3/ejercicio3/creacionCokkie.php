<?php
// Configuración de la cookie:
// Nombre: centro
// Valor: Ilerna
// Expiración: time() + 30 (segundos)
$nombre_cookie = "centro";
$valor_cookie = "Ilerna";
$expiracion = time() + 30; // 30 segundos

//! Se usa setcookie() para crear la cookie
//! La función setcookie() debe llamarse antes de cualquier salida HTML
setcookie($nombre_cookie, $valor_cookie, $expiracion, "/");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3: Crear Cookie</title>
</head>
<body>
    <h1>3. Creación de una Cookie Simple 🍪</h1>

    <p>Se ha intentado crear la cookie **"<?php echo $nombre_cookie; ?>"** con el valor **"<?php echo $valor_cookie; ?>"**.</p>
    <p>La cookie expirará en **30 segundos** a partir de esta carga de página.</p>
    
    <h2>Nota Importante</h2>
    <p>
        <strong>La cookie NO estará disponible</strong> en el array `$_COOKIE` hasta la **siguiente petición** (al refrescar la página).
        Para ver la lectura y verificación, refresca la página o ve al ejercicio 4.
    </p>

</body>
</html>