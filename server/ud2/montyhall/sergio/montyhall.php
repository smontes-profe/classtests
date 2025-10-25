<?php

// Mostramos los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Variable para las estadisticas
session_start();
if (!isset($_SESSION["mantener_ganadas"])) $_SESSION["mantener_ganadas"] = 0;
if (!isset($_SESSION["cambiar_ganadas"])) $_SESSION["cambiar_ganadas"] = 0;
if (!isset($_SESSION["mantener_total"])) $_SESSION["mantener_total"] = 0;
if (!isset($_SESSION["cambiar_total"])) $_SESSION["cambiar_total"] = 0;

// Funcion para elegir aleatoriamente donde esta el coche
function elegirPuertaPremio() {
    return rand(1, 3);
}

// Funcion para elegir una puerta con cabra para abrir(disitinta a la elegida y la del coche)
function elegirPuertaCabra($puertaElegida, $puertaPremio) {
    $puertas = [1, 2, 3];
    foreach ($puertas as $p) {
        if ($p != $puertaElegida && $p != $puertaPremio) {
            return $p;
        }
    }
}

//Funcion para que padamos mostrar las puertas
function mostrarPuertas($abiertas = [], $puertaPremio = null) {
    
    $imgPuerta = "puerta.png";
    $imgCabra  = "cabra.png";
    $imgCoche  = "coche.png";
    echo "<div style='display:flex; justify-content:center; gap:20px; margin-top:20px;'>";

    for ($i = 1; $i <= 3; $i++) {
        echo "<div style='text-align:center;'>";

        // Si la puerta está abierta
        if (in_array($i, $abiertas)) {
            // Mostrar premio o cabra
            if ($puertaPremio == $i) {
                echo "<img src='coche.png' width='120'><br>🚗 Coche";
            } else {
                echo "<img src='cabra.png' width='120'><br>🐐 Cabra";
            }
        } else {
            // Mostrar la puerta cerrada como botón
            echo "<form method='get' style='display:inline-block;'>
                    <input type='hidden' name='puerta' value='$i'>
                    <button type='submit' style='border:none; background:none;'>
                        <img src='$imgPuerta' width='150' alt='Puerta $i'>
                    </button>
                    <br>Puerta $i
                  </form>";
        }

        echo "</div>";
    }

    echo "</div>";
}

//Funcion para que podamos mostrar las estadisticas
function mostrarEstadisticas() {
    global $_SESSION;

    $mantenerTotal = $_SESSION["mantener_total"];
    $cambiarTotal = $_SESSION["cambiar_total"];

    $mantenerGanadas = $_SESSION["mantener_ganadas"];
    $cambiarGanadas = $_SESSION["cambiar_ganadas"];

    $porcMantener = $mantenerTotal > 0 ? round(($mantenerGanadas / $mantenerTotal) * 100, 2) : 0;
    $porcCambiar = $cambiarTotal > 0 ? round(($cambiarGanadas / $cambiarTotal) * 100, 2) : 0;

    echo "<hr><h3>📊 Estadísticas</h3>";
    echo "<p>Veces ganadas manteniendo: <strong>$mantenerGanadas / $mantenerTotal</strong> → $porcMantener%</p>";
    echo "<p>Veces ganadas cambiando: <strong>$cambiarGanadas / $cambiarTotal</strong> → $porcCambiar%</p>";

    echo "<form method='post'><input type='submit' name='reset' value='🔄 Reiniciar estadísticas'></form>";
}

// Para reiniciar las estadisticas
if (isset($_POST["reset"])) {
    session_destroy();
    header("Location: montyhall.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Juego Monty Hall</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>🚪 Juego del Problema de Monty Hall 🚗🐐</h1>
<?php
// Mostramos las puertas iniciales
if (!isset($_GET["puerta"]) && !isset($_GET["accion"])) {
    echo "<h2>Elige una puerta. Detrás de una hay un coche, detrás de las otras cabras.</h2>";
    $puertaPremio = elegirPuertaPremio();
    $_SESSION["puertaPremio"] = $puertaPremio;
    mostrarPuertas();
    mostrarEstadisticas();
    exit;
}

// El usuario elige una puerta
if (isset($_GET["puerta"]) && !isset($_GET["accion"])) {
    $puertaElegida = $_GET["puerta"];
    $puertaPremio = $_SESSION["puertaPremio"];
    $puertaCabraAbierta = elegirPuertaCabra($puertaElegida, $puertaPremio);

    $_SESSION["puertaElegida"] = $puertaElegida;
    $_SESSION["puertaCabraAbierta"] = $puertaCabraAbierta;

    echo "<h2>Has elegido la puerta $puertaElegida 🚪</h2>";
    echo "<p>Se abre la puerta $puertaCabraAbierta... detrás hay una 🐐 cabra.</p>";
    echo "<p>¿Quieres mantener tu elección o cambiar?</p>";

    echo "<form method='get'>
            <input type='hidden' name='accion' value='mantener'>
            <input type='submit' value='Mantener mi puerta'>
          </form>
          <form method='get'>
            <input type='hidden' name='accion' value='cambiar'>
            <input type='submit' value='Cambiar de puerta'>
          </form>";

    mostrarPuertas([$puertaCabraAbierta]);
    mostrarEstadisticas();
    exit;
}

// Mostramos el resultado final
if (isset($_GET["accion"])) {
    $accion = $_GET["accion"];
    $puertaPremio = $_SESSION["puertaPremio"];
    $puertaElegida = $_SESSION["puertaElegida"];
    $puertaCabraAbierta = $_SESSION["puertaCabraAbierta"];

    if ($accion == "cambiar") {
        for ($i = 1; $i <= 3; $i++) {
            if ($i != $puertaElegida && $i != $puertaCabraAbierta) {
                $puertaElegida = $i;
                break;
            }
        }
        $_SESSION["cambiar_total"]++;
        $haGanado = ($puertaElegida == $puertaPremio);
        if ($haGanado) $_SESSION["cambiar_ganadas"]++;
    } else {
        $_SESSION["mantener_total"]++;
        $haGanado = ($puertaElegida == $puertaPremio);
        if ($haGanado) $_SESSION["mantener_ganadas"]++;
    }

    echo "<h2>Resultado final:</h2>";
    if ($haGanado) {
        echo "<h3 class='resultado-ganado'>🎉 ¡Has ganado el coche!</h3>";
    } else {
        echo "<h3 class='resultado-perdido'>🐐 Te llevas una cabra...</h3>";
    }

    mostrarPuertas([1, 2, 3], $puertaPremio);
    echo "<br><form method='get'><input type='submit' value='🔁 Jugar otra vez'></form>";

    mostrarEstadisticas();
}
?>
</body>
</html>