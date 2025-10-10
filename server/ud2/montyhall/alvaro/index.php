<?php
// ============================================================
// UD2 - Actividad 2: El Problema de Monty Hall
// Autor: Álvaro
// ============================================================

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ------------------------------------------------------------
// FUNCIONES
// ------------------------------------------------------------
function elegirPuertaConPremio() {
    return rand(1, 3);
}

function elegirPuertaConCabra($eleccionJugador, $puertaPremio) {
    $posibles = [];
    for ($i = 1; $i <= 3; $i++) {
        if ($i != $eleccionJugador && $i != $puertaPremio) {
            $posibles[] = $i;
        }
    }
    return $posibles[array_rand($posibles)];
}

function mostrarPuertas($puertaPremio, $puertaElegida = null, $puertaAbierta = null, $mostrarFinal = false) {
    echo '<div class="puertas">';
    for ($i = 1; $i <= 3; $i++) {
        echo '<div class="puerta">';
        if ($mostrarFinal) {
            if ($i == $puertaPremio) {
                echo '<img src="images/coche_puerta.png" alt="Coche">';
            } else {
                echo '<img src="images/cabra_puerta.png" alt="Cabra">';
            }
            if ($i == $puertaElegida) echo "<br><strong>Tu elección</strong>";
        } else {
            if ($i == $puertaAbierta) {
                echo '<img src="images/cabra_puerta.png" alt="Cabra">';
            } else {
                echo '<img src="images/puerta_cerrada.png" alt="Puerta">';
                if ($puertaElegida === null) {
                    echo '<form method="GET">
                            <input type="hidden" name="premio" value="' . $puertaPremio . '">
                            <input type="hidden" name="pick" value="' . $i . '">
                            <button type="submit">Elegir puerta ' . $i . '</button>
                          </form>';
                } elseif ($i == $puertaElegida) {
                    echo "<br><strong>Tu elección</strong>";
                }
            }
        }
        echo '</div>';
    }
    echo '</div>';
}

// ------------------------------------------------------------
// VARIABLES PRINCIPALES
// ------------------------------------------------------------
$premio = isset($_GET['premio']) ? intval($_GET['premio']) : null;
$pick = isset($_GET['pick']) ? intval($_GET['pick']) : null;
$decision = isset($_GET['decision']) ? $_GET['decision'] : null;

// Inicializar estadísticas
if (!isset($_SESSION['mantener_ganadas'])) $_SESSION['mantener_ganadas'] = 0;
if (!isset($_SESSION['cambiar_ganadas']))  $_SESSION['cambiar_ganadas']  = 0;
if (!isset($_SESSION['mantener_total']))   $_SESSION['mantener_total']   = 0;
if (!isset($_SESSION['cambiar_total']))    $_SESSION['cambiar_total']    = 0;

// Reiniciar estadísticas si se solicita
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Iniciar partida si no hay premio
if ($premio === null) {
    $premio = elegirPuertaConPremio();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema de Monty Hall</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>🎲 Problema de Monty Hall</h1>

<?php
// 1️⃣ Elegir puerta
if ($pick === null) {
    echo "<p>Elige una de las tres puertas:</p>";
    mostrarPuertas($premio);
    exit;
}

// 2️⃣ Monty abre una puerta con cabra
$puertaAbierta = elegirPuertaConCabra($pick, $premio);

// 3️⃣ Si el jugador ya decide
if ($decision !== null) {

    if ($decision === 'mantener') {
        $puertaFinal = $pick;
        $_SESSION['mantener_total']++;
    } else {
        for ($i = 1; $i <= 3; $i++) {
            if ($i != $pick && $i != $puertaAbierta) $puertaFinal = $i;
        }
        $_SESSION['cambiar_total']++;
    }

    $gano = ($puertaFinal == $premio);

    if ($gano && $decision === 'mantener') $_SESSION['mantener_ganadas']++;
    if ($gano && $decision === 'cambiar')  $_SESSION['cambiar_ganadas']++;

    $mantener_pct = $_SESSION['mantener_total'] > 0 ? round(($_SESSION['mantener_ganadas'] / $_SESSION['mantener_total']) * 100, 1) : 0;
    $cambiar_pct  = $_SESSION['cambiar_total'] > 0 ? round(($_SESSION['cambiar_ganadas'] / $_SESSION['cambiar_total']) * 100, 1) : 0;

    echo "<h2>Resultado final</h2>";
    mostrarPuertas($premio, $puertaFinal, null, true);

    echo $gano
        ? "<h2 class='ganador'>¡Has ganado el coche! 🚗🎉</h2>"
        : "<h2 class='perdedor'>Has perdido... era una cabra 🐐</h2>";

    echo '<h3>📊 Estadísticas</h3>';
    echo "<p>Manteniendo: {$_SESSION['mantener_ganadas']} victorias de {$_SESSION['mantener_total']} → $mantener_pct%</p>";
    echo "<p>Cambiando: {$_SESSION['cambiar_ganadas']} victorias de {$_SESSION['cambiar_total']} → $cambiar_pct%</p>";

    // Botón jugar otra vez
    echo '<form method="GET"><button>Jugar otra vez</button></form>';

    // Botón reiniciar
    echo '<form method="GET" class="form-accion">
            <input type="hidden" name="reset" value="1">
            <button>Reiniciar estadísticas</button>
          </form>';

    exit;
}

// 4️⃣ Aún no decide
echo "<p>Has elegido la <strong>puerta $pick</strong>.</p>";
echo "<p>Monty abre la puerta <strong>$puertaAbierta</strong>... ¡y aparece una cabra! 🐐</p>";
echo "<p>¿Mantienes tu elección o cambias a la otra puerta?</p>";

// Botones decisión
echo '<form method="GET"><input type="hidden" name="premio" value="'.$premio.'"><input type="hidden" name="pick" value="'.$pick.'"><input type="hidden" name="decision" value="mantener"><button>Mantener</button></form>';
echo '<form method="GET"><input type="hidden" name="premio" value="'.$premio.'"><input type="hidden" name="pick" value="'.$pick.'"><input type="hidden" name="decision" value="cambiar"><button>Cambiar</button></form>';

mostrarPuertas($premio, $pick, $puertaAbierta, false);
?>

</body>
</html>
