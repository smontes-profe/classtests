<?php
$expiracion = time() + 30;

setcookie("centro", "Ilerna", $expiracion); 
echo"<h1>Creación de una Cookie Simple</h1>";
echo "Cookie 'centro' con valor 'Ilerna' creada. Expira en 30 segundos (aproximadamente a las: " . date('H:i:s', $expiracion) . ").";
echo "<br>Nota: La cookie no estará disponible en el array \$_COOKIE hasta la próxima carga de la página.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de una Cookie Simple</title>
</head>
<body>
    <figure>
        <img src="../assets/cookie.png" alt="cookie on devTools">
        <figcaption>La cookie creada en devTools.</figcaption>
    </figure>
    <style>
        figure{
            display:flex;
            width: 100vw;
            align-items:center;
            flex-direction:column;
        }
        figure img{
            width: 80%;
        }
    </style>
</body>
</html>