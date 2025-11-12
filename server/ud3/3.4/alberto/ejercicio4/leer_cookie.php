<?php
echo "<h1>Lectura de una Cookie</h1>";
echo "<h2>Contenido de \$_COOKIE:</h2>";
//var_dump es una funcion que permite devuelve ver la información completa de una variable
var_dump($_COOKIE);

echo "<hr>";
if (isset($_COOKIE['centro'])) {
    echo "<h2>Valor de la cookie 'centro':</h2>";
    // depuro con htmlspecialchars
    echo "El centro es: <strong>" . htmlspecialchars($_COOKIE['centro']) . "</strong>";
} else {
    echo "La cookie 'centro' no existe o ha expirado.";
}

$expiracion = time() + 30;
setcookie("centro", "Ilerna", $expiracion); 
echo "<br><br><em>(Se intenta crear/refrescar la cookie con valor 'Ilerna' en esta petición)</em>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectura de una Cookie</title>
</head>
<body>
    <figure>
        <div class="imgContainer"><img src="../assets/var_dump_ej4.png" alt="var_dump()"></div>
        <figcaption>resultado de var_dump() tras recoger la cookie</figcaption>
    </figure>
    <style>
        figure{
            display:flex;
            width: 100vw;
            align-items:center;
            flex-direction:column;
        }
        .imgContainer{
            display:flex;
            align-items:center;
            flex-direction:column;
            width: 22em;
            padding:40px;
            border-radius:25px;
            box-shadow: 1px 1px 10px 5px grey;
        }
        figure div img{
            width: 80%;
        }
        figcaption{
            margin-top:10px;
        }
    </style>
</body>
</html>