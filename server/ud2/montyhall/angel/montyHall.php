<?php

// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar sesión
session_start();

// Reiniciar juego
if (isset($_GET['reset'])) {

    // Guardamos las estadísticas antes de reiniciar
    $statsGuardadas = $_SESSION['stats'] ?? null;

    // Solo borramos las variables del juego, no toda la sesión
    unset($_SESSION['puertas']);
    unset($_SESSION['puertaPremio']);
    unset($_SESSION['puertaElegida']);
    unset($_SESSION['puertaAbierta']);
    unset($_SESSION['resultado']);

    // Restauramos estadísticas si existían
    if ($statsGuardadas) {
        $_SESSION['stats'] = $statsGuardadas;
    }

    // Redirige al mismo php con el PHP_SELF, es lo mismo que usar header("Location: montyHall.php");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Reiniciar estadísticas
if (isset($_GET['reset_stats'])) {

    // Reiniciamos solo las estadísticas
    $_SESSION['stats'] = [
        'mantener_ganadas' => 0,
        'cambiar_ganadas' => 0,
        'mantener_jugadas' => 0,
        'cambiar_jugadas' => 0
    ];

    // Redirige al mismo php con el PHP_SELF, es lo mismo que usar header("Location: montyHall.php");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Inicializar juego (si no existe)
if (!isset($_SESSION['puertas'])) {

    // Creamos puertas y asignamos premio
    $_SESSION['puertas'] = [0, 0, 0];
    $puertaPremio = rand(0, 2);
    $_SESSION['puertas'][$puertaPremio] = 1;
    $_SESSION['puertaPremio'] = $puertaPremio;
}

// Inicializar estadísticas
if (!isset($_SESSION['stats'])) {
    $_SESSION['stats'] = [
        'mantener_ganadas' => 0,
        'cambiar_ganadas' => 0,
        'mantener_jugadas' => 0,
        'cambiar_jugadas' => 0
    ];
}

// Función para elegir una puerta inicial
function elegirPuerta($puertaElegida)
{
    // Restamos uno porque el usuario elige entre 1-3 y nosotros usamos 0-2
    $puertaElegida--;
    $_SESSION['puertaElegida'] = $puertaElegida;

    $puertasPosibles = [];

    // Recorrer puertas para encontrar una vacía que no sea la elegida
    foreach ([0, 1, 2] as $puerta) {
        if ($puerta != $puertaElegida && $_SESSION['puertas'][$puerta] == 0) {
            $puertasPosibles[] = $puerta;
        }
    }

    // Abrir una puerta vacía aleatoria
    $_SESSION['puertaAbierta'] = $puertasPosibles[array_rand($puertasPosibles)];
}

// Función para cambiar de puerta
function cambiarPuerta()
{
    // Cambiar a la otra puerta que no sea la elegida ni la abierta
    foreach ([0, 1, 2] as $puerta) {
        if ($puerta != $_SESSION['puertaElegida'] && $puerta != $_SESSION['puertaAbierta']) {
            $_SESSION['puertaElegida'] = $puerta;
            break;
        }
    }
}

// Mostrar estadísticas
function mostrarEstadisticas()
{
    $s = $_SESSION['stats'];

    // Calculamos porcentajes
    $porcMantener = $s['mantener_jugadas'] > 0 ? round(($s['mantener_ganadas'] / $s['mantener_jugadas']) * 100, 2) : 0;
    $porcCambiar = $s['cambiar_jugadas'] > 0 ? round(($s['cambiar_ganadas'] / $s['cambiar_jugadas']) * 100, 2) : 0;

    // Mostrar estadísticas con Bootstrap y HTML
    echo "
    <div class='card mt-4'>
        <div class='card-body'>
            <h4 class='card-title'>📊 Estadísticas</h4>
            <p class='card-text mb-1'>Ganadas manteniendo: {$s['mantener_ganadas']} / {$s['mantener_jugadas']} ({$porcMantener}%)</p>
            <p class='card-text'>Ganadas cambiando: {$s['cambiar_ganadas']} / {$s['cambiar_jugadas']} ({$porcCambiar}%)</p>
            <a href='?reset_stats=1' class='btn btn-outline-danger mt-2'>🧹 Reiniciar estadísticas</a>
        </div>
    </div>";
}

// Fase 1: elegir puerta
if (isset($_GET['puerta'])) {
    elegirPuerta($_GET['puerta']);
}

// Fase 2: decidir mantener o cambiar
if (isset($_GET['accion'])) {
    $cambio = ($_GET['accion'] == 'cambiar');

    if ($cambio) {

        // Si decide cambiar, cambiamos la puerta
        cambiarPuerta();
        $_SESSION['stats']['cambiar_jugadas']++;
    } else {

        // Mantener la puerta elegida
        $_SESSION['stats']['mantener_jugadas']++;
    }

    // Comprobar si ha ganado
    $gana = ($_SESSION['puertas'][$_SESSION['puertaElegida']] == 1);

    if ($gana) {

        // Actualizar estadísticas según si cambió o no
        if ($cambio) $_SESSION['stats']['cambiar_ganadas']++;
        else $_SESSION['stats']['mantener_ganadas']++;
        $_SESSION['resultado'] = "🎉 ¡Ganaste el coche!";
    } else {
        $_SESSION['resultado'] = "💀 Mala suerte, te tocó una cabra.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monty Hall</title>
    <link rel="icon" href="img/ruleta.png">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body class="bg-light">

    <div class="container py-5 text-center">
        <h2 class="mb-4">🚪 Juego de las 3 Puertas (Monty Hall)</h2>
        <p class="mb-4">Elige una puerta y decide si quieres mantener tu elección o cambiar después de que se abra una puerta vacía.</p>

        <!-- Fase 1: elegir puerta -->
        <?php if (!isset($_SESSION['puertaElegida'])): ?>
            <form method="get" class="d-flex justify-content-center gap-3">
                <button name="puerta" value="1" class="btn btn-outline-primary">
                    <img src="img/puertaCerrada.png" alt="Puerta 1" width="120"><br>Puerta 1
                </button>
                <button name="puerta" value="2" class="btn btn-outline-primary">
                    <img src="img/puertaCerrada.png" alt="Puerta 2" width="120"><br>Puerta 2
                </button>
                <button name="puerta" value="3" class="btn btn-outline-primary">
                    <img src="img/puertaCerrada.png" alt="Puerta 3" width="120"><br>Puerta 3
                </button>
            </form>
        <?php endif; ?>

        <!-- Fase 2: ofrecer cambiar -->
        <?php if (isset($_SESSION['puertaElegida']) && !isset($_SESSION['resultado'])): ?>
            <div class="mt-4">
                <p>Has elegido la puerta <strong><?= $_SESSION['puertaElegida'] + 1 ?></strong>.</p>
                <p>El presentador abre la puerta <strong><?= $_SESSION['puertaAbierta'] + 1 ?></strong> (vacía 🐐).</p>
                <img src="img/cabra.png" alt="Cabra" width="120" class="my-2">
                <p class="mt-3">¿Quieres mantener tu elección o cambiar de puerta?</p>

                <form method="get" class="d-flex justify-content-center gap-3 mt-3">
                    <button name="accion" value="mantener" class="btn btn-success btn-lg">🚪 Mantener</button>
                    <button name="accion" value="cambiar" class="btn btn-warning btn-lg">🔁 Cambiar</button>
                </form>
            </div>
        <?php endif; ?>

        <!-- Fase 3: resultado -->
        <?php if (isset($_SESSION['resultado'])): ?>
            <div class="mt-5">
                <h3 class="mb-4"><?= $_SESSION['resultado'] ?></h3>

                <div class="d-flex justify-content-center gap-3">
                    <?php
                    for ($i = 0; $i < 3; $i++) {
                        echo "<div class='card text-center' style='width: 150px;'>";
                        echo "<div class='card-body'>";
                        if ($i == $_SESSION['puertaPremio']) {
                            echo "<img src='img/coche.png' alt='Coche' width='120'><br>";
                        } else {
                            echo "<img src='img/cabra.png' alt='Cabra' width='120'><br>";
                        }
                        echo "<small>Puerta " . ($i + 1) . "</small>";
                        echo "</div></div>";
                    }
                    ?>
                </div>

                <p class="mt-3">La puerta premiada era la <strong><?= $_SESSION['puertaPremio'] + 1 ?></strong>.</p>
                <a href="?reset=1" class="btn btn-primary mt-3">🔄 Jugar otra vez</a>

                <?php mostrarEstadisticas(); ?>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>