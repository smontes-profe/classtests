<!--
Ejercicio: El Problema de Monty Hall en PHP

Vas a simular el famoso concurso de las “3 puertas”.

En la página se muestran tres puertas. Detrás de una hay un coche (premio) y detrás de las otras dos, cabras.
El usuario elige una puerta → la elección se envía por GET a la misma página.
El programa abrirá automáticamente una de las otras dos puertas que tenga una cabra, y dará al usuario la opción:
Mantener su puerta inicial.
Cambiar a la otra puerta cerrada.
Tras la decisión final, la página abrirá las puertas y mostrará si el usuario ganó el premio.
Además, el sistema debe llevar un contador de estadísticas:
Cuántas veces ganó manteniendo su puerta.
Cuántas veces ganó cambiando.
Porcentajes de éxito en cada estrategia.
Puedes hacer las puertas y el resultado usando simplemente botones con texto que pongan "puerta 1", "puerta2"..
 y luego se cambien por "cabra" o "premio" o puedes hacerlo con imágenes de puertas, cabra y coche sacados de internet
(por favor, hazlo así, y cuanto más "cany" mejor).
Entregable: 

Empaqueta todos los archivos que uses en un zip.
 Importante que las rutas sean relativas para que funcione cuando el profe lo pase todo a su servidor.

Condiciones extras:

Tecnologías explícitas

“Se usará PHP para la lógica del servidor y HTML para mostrar la página web con botones e imágenes.”

Funciones y bucles

“Se deben usar funciones para separar lógicas (como elegir la puerta con cabra o mostrar resultados)
 y bucles para generar dinámicamente las puertas.”

Variables y ámbitos

“Se deben usar variables locales y globales de manera clara.”

Arrays, operadores y condicionales

El código debe incluir al menos uno de cada. Si tu código para resolver el problema no hace uso de alguno de ellos,
 inclúyelo de alguna manera, aunque sean con variables que se usen, y que se muestren por pantalla de alguna forma,
aunque sea aparte del ejercicio de Monty Hall.

Error reporting 

Utiliza error_reporting() para que muestre todos los errores (investiga cómo hacerlo si no sabes).

-->

<?php
session_start(); // Iniciamos sesión para guardar estadísticas
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Variables globales
$puertas = [1, 2, 3];
$puertaPrecio = null;
$userDecision = null;
$puertaRevelada = null;

// Inicializamos estadísticas si no existen
if (!isset($_SESSION['gamesTotales'])) {
    $_SESSION['gamesTotales'] = 0;
    $_SESSION['cambioAciertoContador'] = 0;
    $_SESSION['quedarseAciertoContador'] = 0;
    $_SESSION['cambioTotalContador'] = 0;
    $_SESSION['quedarseTotalContador'] = 0;
}

// --- FUNCIONES ---

// Inicializa un nuevo juego
function inicializarGame() {
    global $puertas, $puertaPrecio, $userDecision, $puertaRevelada;
    $puertaPrecio = $puertas[array_rand($puertas)];
    $userDecision = null;
    $puertaRevelada = null;
}

// Revela una puerta con cabra (nunca la elegida ni la del premio)
function revelarPuerta($userDecision, $puertaPrecio) {
    global $puertas, $puertaRevelada;
    $puertasPosibles = array_diff($puertas, [$userDecision, $puertaPrecio]);
    $puertaRevelada = count($puertasPosibles) > 1 ? array_rand(array_flip($puertasPosibles)) : array_values($puertasPosibles)[0];
}

// Muestra las puertas según la fase del juego
function mostrarPuertas($fase, $userDecision = null, $puertaPrecio = null, $puertaRevelada = null) {
    echo '<div class="doors">';
    for ($i = 1; $i <= 3; $i++) {
        switch ($fase) {
            case 'inicio':
                echo '
                <button type="submit" name="door" value="' . $i . '" class="door-btn">
                    <img src="img/puerta_close.png">
                    <span>Puerta ' . $i . '</span>
                </button>';
                break;

            case 'revelacion':
                if ($i == $puertaRevelada) {
                    echo '<div class="door"><img src="img/cabra.webp"><span>Puerta ' . $i . '</span></div>';
                } elseif ($i == $userDecision) {
                    echo '<div class="door selected"><img src="img/puerta_close.png"><span>Puerta ' . $i . ' (tu elegida)</span></div>';
                } else {
                    echo '<div class="door"><img src="img/puerta_close.png"><span>Puerta ' . $i . '</span></div>';
                }
                break;

            case 'final':
                if ($i == $puertaPrecio) {
                    echo '<div class="door"><img src="img/coche.jpg"><span>Puerta ' . $i . '</span></div>';
                } else {
                    echo '<div class="door"><img src="img/cabra.webp"><span>Puerta ' . $i . '</span></div>';
                }
                break;
        }
    }
    echo '</div>';
}

// Muestra resultados y actualiza estadisticas
function mostrarResultados($userDecision, $puertaPrecio, $accion) {
    global $puertaRevelada;

    // Actualizamos estadisticas
    $_SESSION['gamesTotales']++;
    if ($accion == 'cambiar') {
        $_SESSION['cambioTotalContador']++;
        if ($userDecision == $puertaPrecio) $_SESSION['cambioAciertoContador']++;
    } else {
        $_SESSION['quedarseTotalContador']++;
        if ($userDecision == $puertaPrecio) $_SESSION['quedarseAciertoContador']++;
    }

    // Mostrar resultado del juego
    echo '<h2>Resultado final:</h2>';
    mostrarPuertas('final', $userDecision, $puertaPrecio, $puertaRevelada);

    if ($userDecision == $puertaPrecio) {
        echo '<h3 class="win">¡Has Ganado el coche!</h3>';
    } else {
        echo '<h3 class="lose">Ganaste una cabra pringao.</h3>';
    }

    echo '<a href="Act2.php" class="play-again">Jugar de nuevo</a>';
}

// Funcion para mostrar los contadores siempre
function mostrarContadores() {
    $cambioPorc = $_SESSION['cambioTotalContador'] > 0 ? round(($_SESSION['cambioAciertoContador']/$_SESSION['cambioTotalContador'])*100, 2) : 0;
    $quedarsePorc = $_SESSION['quedarseTotalContador'] > 0 ? round(($_SESSION['quedarseAciertoContador']/$_SESSION['quedarseTotalContador'])*100, 2) : 0;

    echo '
    <div class="stats-bar">
        <p><strong>Juegos:</strong> ' . $_SESSION['gamesTotales'] . '</p>
        <p><strong>Mantener:</strong> ' . $_SESSION['quedarseAciertoContador'] . '/' . $_SESSION['quedarseTotalContador'] . ' (' . $quedarsePorc . '%)</p>
        <p><strong>Cambiar:</strong> ' . $_SESSION['cambioAciertoContador'] . '/' . $_SESSION['cambioTotalContador'] . ' (' . $cambioPorc . '%)</p>
    </div>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las 3 puertas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="lights">
    <h1>El problema de las 3 puertas</h1>

    <?php
    if (!isset($_GET['door'])) {
        inicializarGame();
        echo '<h2>Elige una puerta:</h2>';
        echo '<form action="Act2.php" method="get" class="doors-form">';
        mostrarPuertas('inicio');
        echo '</form>';

    } elseif (isset($_GET['door']) && !isset($_GET['accion'])) {
        $userDecision = (int)$_GET['door'];
        $puertaPrecio = rand(1, 3);
        revelarPuerta($userDecision, $puertaPrecio);

        echo '<h2>Has elegido la puerta ' . $userDecision . '.</h2>';
        echo '<p>Voy a abrir una puerta con una cabra detrás...</p>';
        mostrarPuertas('revelacion', $userDecision, $puertaPrecio, $puertaRevelada);

        echo '<form method="get" action="Act2.php" class="actions">';
        echo '<input type="hidden" name="door" value="' . $userDecision . '">';
        echo '<input type="hidden" name="premio" value="' . $puertaPrecio . '">';
        echo '<input type="hidden" name="revelada" value="' . $puertaRevelada . '">';
        echo '<button type="submit" name="accion" value="mantener" class="action-btn">Mantener mi puerta</button>';
        echo '<button type="submit" name="accion" value="cambiar" class="action-btn">Cambiar de puerta</button>';
        echo '</form>';

    } elseif (isset($_GET['accion'])) {
        $userDecision = (int)$_GET['door'];
        $puertaPrecio = (int)$_GET['premio'];
        $puertaRevelada = (int)$_GET['revelada'];

        if ($_GET['accion'] == 'cambiar') {
            $userDecision = array_values(array_diff([1, 2, 3], [$userDecision, $puertaRevelada]))[0];
            echo '<h2>Has decidido CAMBIAR de puerta.</h2>';
        } else {
            echo '<h2>Has decidido MANTENER tu puerta.</h2>';
        }

        mostrarResultados($userDecision, $puertaPrecio, $_GET['accion']);
    }

    // Mostrar los contadores siempre al final
    mostrarContadores();
    ?>
</body>
</html>
