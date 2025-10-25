
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monty Hall</title>
</head>

<body> <!-- No puedo más :( -->

<h1>Elige una puerta</h1>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


// Array de las 3 puertas
$puertas = [
    1 => "img/puertaMorada.png",
    2 => "img/puertaAzul.png",
    3 => "img/puertaRoja.png"
];

// Variables
if (!isset($_SESSION["puertaPremio"])) {
    $_SESSION["puertaPremio"] = rand(1, 3);
    $_SESSION["intento"] = 1;
    $_SESSION["puertasElegidas"] = [];
}

$puertaPremio = $_SESSION["puertaPremio"];
$intento = $_SESSION["intento"];
$mensaje = "";
$fin = false;
// Función para mostrar puertas
function mostrarPuertas($puertas, $puertaPremio, $puertasElegidas, $mostrarFinal = false) {
    echo "<div class='puertas'>";
    foreach ($puertas as $num => $img) {
        if ($mostrarFinal) {
            // Mostrar todas abiertas
            if ($num == $puertaPremio) {
                echo "<img src='img/dinero.png' id='foto'>";
            } else {
                echo "<img src='img/cabra.png' id='foto'>";
            }
        } else {
            // Mostrar puerta
            if (in_array($num, $puertasElegidas)) {
                // Mostrar su contenido
                if ($num == $puertaPremio) {
                    echo "<img src='img/dinero.png' id='foto'>";
                } else {
                    echo "<img src='img/cabra.png' id='foto'>";
                }
            } else {
                // Si no se ha elegido, mostrar la puerta cerrada
                echo "<a href='?puerta=$num'><img src='$img' alt='puerta $num'></a>";
            }
        }
    }
    echo "</div>";
}

// Si el usuario elige una puerta
if (isset($_GET["puerta"])) {
    $eleccion = (int)$_GET["puerta"];
    if (!in_array($eleccion, $_SESSION["puertasElegidas"])) {
        $_SESSION["puertasElegidas"][] = $eleccion;
    }

    if ($intento == 1) {
        if ($eleccion == $puertaPremio) {
            $mensaje = "¡Has ganado!";
            $fin = true;
        } else {
            $mensaje = "Has encontrado una cabra, elige otra puerta";
            $_SESSION["intento"] = 2;
        }
    } elseif ($intento == 2) {
        if ($eleccion == $puertaPremio) {
            $mensaje = "¡Has ganado!";
        } else {
            $mensaje = "¡Has perdido!";
        }
        $fin = true;
    }
}

// Mostrar puertas y mensajes
if ($fin) {
    mostrarPuertas($puertas, $puertaPremio, $_SESSION["puertasElegidas"], true);
    echo "<div class='mensaje'>$mensaje</div>";
    echo "<form method='get'><button class='boton' type='submit'>🔁 Jugar otra vez</button></form>";
    session_destroy();
} else {
    mostrarPuertas($puertas, $puertaPremio, $_SESSION["puertasElegidas"]);
    if ($mensaje != "") {
        echo "<div class='mensaje'>$mensaje</div>";
    }
}

?>
</div>

</body>
</html>


