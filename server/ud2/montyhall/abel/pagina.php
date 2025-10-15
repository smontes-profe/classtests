<?php
// Mostrar todos los errores para depuración (requisito de la actividad)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar sesión para almacenar estadísticas sin archivos
session_start();

// Inicializar estadísticas si no existen
if (!isset($_SESSION['keep_wins'])) {
    $_SESSION = [
        'keep_wins' => 0,
        'keep_total' => 0,
        'switch_wins' => 0,
        'switch_total' => 0
    ];
}

// Función para elegir aleatoriamente la puerta con el premio
function elegir_premio() {
    return rand(1, 3);
}

// Función para elegir una puerta con cabra (que no sea la elegida ni la del premio)
function elegir_puerta_cabra($eleccion, $premio) {
    $puertas = [1, 2, 3];
    $candidatas = [];
    foreach ($puertas as $puerta) {
        if ($puerta != $eleccion && $puerta != $premio) {
            $candidatas[] = $puerta;
        }
    }
    return $candidatas[array_rand($candidatas)];
}

// Obtener parámetros de la URL (método GET)
$eleccion = isset($_GET['eleccion']) ? intval($_GET['eleccion']) : null;
$premio = isset($_GET['premio']) ? intval($_GET['premio']) : null;
$abierta = isset($_GET['abierta']) ? intval($_GET['abierta']) : null;
$decision = isset($_GET['decision']) ? $_GET['decision'] : null;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Monty Hall</title>
    <style>
        body {
            background-color: #131212bd;
            color: #fff;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        h1 { color: #ffcc00; }

        .puertas {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
        }

        .puerta {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        img {
            width: 180px;
            height: 120px;
        }

        .boton {
            background: #ffcc00;
            color: #000;
            border: none;
            padding: 10px 15px;
            margin-top: 10px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
        }

        .boton:hover {
            background: #fff700;
        }

        .stats {
            margin-top: 30px;
            text-align: left;
            display: inline-block;
        }

        a {
            color: #ffcc00;
        }
    </style>
</head>
<body>
    <h1>Simulador Monty Hall</h1>
    <p>Elige una puerta para ver si ganas el coche o una cabra</p>

<?php
// CASO 1: No se ha hecho ninguna elección → Mostrar 3 puertas
if (!$eleccion) {
    echo '<div class="puertas">';
    for ($i = 1; $i <= 3; $i++) {
        echo "<div class='puerta'>
                <a href='?eleccion=$i'><img src='puerta.png' alt='Puerta $i'></a>
                <div>Puerta $i</div>
              </div>";
    }
    echo '</div>';
}

// CASO 2: Se eligió una puerta, pero aún no se ha decidido si cambiar
elseif ($eleccion && !$decision) {
    // Elegir aleatoriamente premio y puerta con cabra
    if (!$premio) $premio = elegir_premio();
    if (!$abierta) $abierta = elegir_puerta_cabra($eleccion, $premio);

    echo "<p>Has elegido la <strong>puerta $eleccion</strong>. Yo abro la puerta <strong>$abierta</strong>, que tiene una cabra</p>";

    // Mostrar puertas (una abierta con cabra)
    echo '<div class="puertas">';
    for ($i = 1; $i <= 3; $i++) {
        $img = ($i == $abierta) ? 'cabra.png' : 'puerta.png';
        echo "<div class='puerta'>
                <img src='$img' alt='Puerta $i'>
                <div>Puerta $i</div>
              </div>";
    }
    echo '</div>';

    // Ofrecer decisión: mantener o cambiar
    echo "<div>
        <a href='?eleccion=$eleccion&premio=$premio&abierta=$abierta&decision=mantener' class='boton'>Mantener mi puerta</a>
        <a href='?eleccion=$eleccion&premio=$premio&abierta=$abierta&decision=cambiar' class='boton'>Cambiar de puerta</a>
    </div>";
}

// CASO 3: Decisión final → mostrar resultado
elseif ($eleccion && $decision) {
    $final = ($decision == 'mantener') ? $eleccion : 6 - $eleccion - $abierta; // 1+2+3 = 6
    $ganador = ($final == $premio);

    echo '<div class="puertas">';
    for ($i = 1; $i <= 3; $i++) {
        $img = ($i == $premio) ? 'coche.png' : 'cabra.png';
        $texto = ($i == $final) ? " (tu elección)" : "";
        echo "<div class='puerta'>
                <img src='$img' alt='Puerta $i'>
                <div>Puerta $i $texto</div>
              </div>";
    }
    echo '</div>';

    // Mostrar resultado
    echo '<p><strong>';
    echo $ganador ? ' ¡Has ganado el coche! ' : ' Has ganado una cabra';
    echo '</strong></p>';

    // Actualizar estadísticas
    if ($decision == 'mantener') {
        $_SESSION['keep_total']++;
        if ($ganador) $_SESSION['keep_wins']++;
    } else {
        $_SESSION['switch_total']++;
        if ($ganador) $_SESSION['switch_wins']++;
    }

    // Mostrar botón para reiniciar
    echo "<a href='pagina.php' class='boton'>Jugar otra vez</a>";
}

// Mostrar estadísticas SIEMPRE
$k_total = $_SESSION['keep_total'];
$s_total = $_SESSION['switch_total'];
$k_pct = $k_total ? round($_SESSION['keep_wins'] / $k_total * 100) : 0;
$s_pct = $s_total ? round($_SESSION['switch_wins'] / $s_total * 100) : 0;

echo "<div class='stats'>
    <h3>Estadísticas</h3>
    <p>Victorias manteniendo: {$_SESSION['keep_wins']} / $k_total ($k_pct%)</p>
    <p>Victorias cambiando: {$_SESSION['switch_wins']} / $s_total ($s_pct%)</p>
    <p><a href='?reset=1'>Reiniciar estadísticas</a></p>
</div>";

// Reiniciar estadísticas
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: pagina.php");
    exit;
}
?>

</body>
</html>
