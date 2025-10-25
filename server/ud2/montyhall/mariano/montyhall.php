
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Juego de las 3 Puertas</title>
<link rel="stylesheet" href="montyhall.css">
</head>
<body>

<h1>El Juego de las 3 Puertas</h1>
<p>Una puerta esconde un coche y las otras dos, una cabra.</p>

<?php
session_start();
$puertas = [1, 2, 3];

// Inicializar estadísticas si no existen
if (!isset($_SESSION['ganar_mantener'])) {
    $_SESSION['ganar_mantener'] = 0;
    $_SESSION['jugar_mantener'] = 0;
    $_SESSION['ganar_cambiar'] = 0;
    $_SESSION['jugar_cambiar'] = 0;
}

$etapa = isset($_GET['etapa']) ? intval($_GET['etapa']) : 1;
$premio = isset($_GET['premio']) ? intval($_GET['premio']) : rand(1, 3);


// ETAPA 1 → Elegir una puerta

if ($etapa === 1) {
    echo "<h2>Elige una puerta</h2>";
    echo "<div class='puertas'>";
    foreach ($puertas as $p) {
        $url = "?etapa=2&eleccion={$p}&premio={$premio}";
        echo "<a class='button' href='{$url}'><div class='puerta'><img src='puerta.jpeg' alt='puerta {$p}'></div></a>";
    }
    echo "</div>";
}


// ETAPA 2 → Abrir una puerta con cabra y ofrecer cambiar

elseif ($etapa === 2) {
    if (!isset($_GET['eleccion'])) {
        header("Location: ?etapa=1");
        exit;
    }
    $eleccion = intval($_GET['eleccion']);
    $posibles = array_filter($puertas, fn($p) => $p != $eleccion && $p != $premio);
    $puerta_abierta = $posibles[array_rand($posibles)];

    echo "<h2>Has elegido la puerta {$eleccion}</h2>";
    echo "<p>He abierto la puerta <strong>{$puerta_abierta}</strong> y tiene una cabra.</p>";
    echo "<p>¿Quieres mantener tu puerta o cambiar a la otra?</p>";

    $mantenerUrl = "?etapa=3&accion=mantener&eleccion={$eleccion}&premio={$premio}&abierta={$puerta_abierta}";
    $cambiarUrl  = "?etapa=3&accion=cambiar&eleccion={$eleccion}&premio={$premio}&abierta={$puerta_abierta}";

    echo "<a class='button' href='{$mantenerUrl}'>Mantener mi puerta</a>";
    echo "<a class='button' href='{$cambiarUrl}'>Cambiar de puerta</a>";

    echo "<div class='puertas'>";
    foreach ($puertas as $p) {
        if ($p == $puerta_abierta) {
            echo "<div class='puerta'><img src='descarga.jpeg' alt='cabra'></div>";
        } else {
            echo "<div class='puerta'><img src='puerta.jpeg' alt='puerta cerrada'></div>";
        }
    }
    echo "</div>";
}

// ETAPA 3 → Mostrar resultado final + actualizar estadísticas

elseif ($etapa === 3) {
    if (!isset($_GET['eleccion'], $_GET['accion'], $_GET['abierta'], $_GET['premio'])) {
        header("Location: ?etapa=1");
        exit;
    }

    $accion = $_GET['accion'];
    $eleccion_inicial = intval($_GET['eleccion']);
    $puerta_abierta = intval($_GET['abierta']);

    if ($accion === 'mantener') {
        $eleccion_final = $eleccion_inicial;
        $_SESSION['jugar_mantener']++;
    } else {
        foreach ($puertas as $p) {
            if ($p != $eleccion_inicial && $p != $puerta_abierta) {
                $eleccion_final = $p;
                break;
            }
        }
        $_SESSION['jugar_cambiar']++;
    }

    $gano = ($eleccion_final == $premio);

    if ($gano && $accion === 'mantener') $_SESSION['ganar_mantener']++;
    if ($gano && $accion === 'cambiar') $_SESSION['ganar_cambiar']++;

    echo "<h2>Resultado final</h2>";
    echo "<p>Tu elección final fue la puerta <strong>{$eleccion_final}</strong>.</p>";

    echo "<div class='puertas'>";
    foreach ($puertas as $p) {
        if ($p == $premio) {
            echo "<div class='puerta'><img src='gti.jpeg' alt='coche'></div>";
        } else {
            echo "<div class='puerta'><img src='descarga.jpeg' alt='cabra'></div>";
        }
    }
    echo "</div>";

    echo "<h2>" . ($gano ? "Has ganado el coche" : "Has perdido, te tocó la cabra") . "</h2>";
    echo "<a class='button' href='?etapa=1'>Jugar otra vez</a>";

    // Mostrar estadísticas
    echo "<hr><h2>Estadísticas</h2>";
    $gm = $_SESSION['ganar_mantener'];
    $jm = $_SESSION['jugar_mantener'];
    $gc = $_SESSION['ganar_cambiar'];
    $jc = $_SESSION['jugar_cambiar'];

    $porc_mantener = $jm > 0 ? round(($gm / $jm) * 100, 2) : 0;
    $porc_cambiar  = $jc > 0 ? round(($gc / $jc) * 100, 2) : 0;

    echo "<ul>";
    echo "<li>Manteniendo la puerta: {$gm} victorias de {$jm} partidas ({$porc_mantener}%)</li>";
    echo "<li>Cambiando de puerta: {$gc} victorias de {$jc} partidas ({$porc_cambiar}%)</li>";
    echo "</ul>";

    echo "<a class='button' href='?reset=1'>Reiniciar estadísticas</a>";
}


// Botón para reiniciar estadísticas

if (isset($_GET['reset'])) {
    $_SESSION = [];
    session_destroy();
    header("Location: ?etapa=1");
    exit;
}
?>

</body>
</html>

