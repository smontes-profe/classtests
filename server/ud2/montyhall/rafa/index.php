<?php 
session_start(); 
error_reporting(E_ALL);

// FUNCIONES

// Aquí inicializo las variables de estadísticas si no existen todavía
function inicializarEstadisticas() {
    if (!isset($_SESSION['ganadas_cambiando'])) {
        $_SESSION['ganadas_cambiando'] = 0;
    }
    if (!isset($_SESSION['ganadas_manteniendo'])) {
        $_SESSION['ganadas_manteniendo'] = 0;
    }
    if (!isset($_SESSION['jugadas_cambiando'])) {
        $_SESSION['jugadas_cambiando'] = 0;
    }
    if (!isset($_SESSION['jugadas_manteniendo'])) {
        $_SESSION['jugadas_manteniendo'] = 0;
    }
}

// Esta función decide qué puerta abre Monty Hall
// Monty siempre abre una puerta con cabra que no sea la del jugador
function elegirPuertaMonty($puertaJugador, $puertaGanadora) {
    $todas = [1, 2, 3];
    
    // Si el jugador ya eligió la ganadora, Monty puede abrir cualquiera de las otras dos
    if ($puertaGanadora == $puertaJugador) {
        $posibles = array_diff($todas, [$puertaJugador]);
        return $posibles[array_rand($posibles)];
    } else {
        // Si no, Monty solo puede abrir la que no es ni la del jugador ni la ganadora
        $posibles = array_diff($todas, [$puertaJugador, $puertaGanadora]);
        return array_values($posibles)[0];
    }
}

// Cuando el jugador decide cambiar, esta función calcula a qué puerta se cambia
function calcularCambio($puertaOriginal, $puertaAbierta) {
    $todas = [1, 2, 3];
    $nuevaEleccion = array_diff($todas, [$puertaOriginal, $puertaAbierta]);
    return array_values($nuevaEleccion)[0];
}

// Aquí actualizo las estadísticas después de cada partida
function actualizarEstadisticas($gano, $estrategia) {
    if ($estrategia == "cambio") {
        $_SESSION['jugadas_cambiando']++;
        if ($gano) {
            $_SESSION['ganadas_cambiando']++;
        }
    } else {
        $_SESSION['jugadas_manteniendo']++;
        if ($gano) {
            $_SESSION['ganadas_manteniendo']++;
        }
    }
}

// Esta función muestra las estadísticas acumuladas con los porcentajes
function mostrarEstadisticas() {
    $jugadas_c = $_SESSION['jugadas_cambiando'];
    $jugadas_m = $_SESSION['jugadas_manteniendo'];
    
    echo '<div class="stats">';
    echo '<h3>📊 Estadísticas acumuladas</h3>';
    
    // Muestro las estadísticas de cuando cambias de puerta
    if ($jugadas_c > 0) {
        $porc_c = round($_SESSION['ganadas_cambiando'] / $jugadas_c * 100, 2);
        echo "<p>🔄 Cambiando: {$_SESSION['ganadas_cambiando']} / {$jugadas_c} → {$porc_c}%</p>";
    } else {
        echo "<p>🔄 Cambiando: 0/0</p>";
    }
    
    // Y aquí las de cuando mantienes tu elección
    if ($jugadas_m > 0) {
        $porc_m = round($_SESSION['ganadas_manteniendo'] / $jugadas_m * 100, 2);
        echo "<p>📌 Manteniendo: {$_SESSION['ganadas_manteniendo']} / {$jugadas_m} → {$porc_m}%</p>";
    } else {
        echo "<p>📌 Manteniendo: 0/0</p>";
    }
    
    // Botón para resetear todo
    echo '<form action="index.php" method="get">
            <button type="submit" name="reset" value="1">Reiniciar estadísticas</button>
          </form>';
    echo '</div>';
}

// Esta función dibuja las tres puertas con sus estados correspondientes
function generarPuertas($posibleCambio, $cambiar, $ganadora) {
    echo '<div class="puertas">';
    
    // Genero las 3 puertas en un bucle
    for ($i = 1; $i <= 3; $i++) {
        $img = "puerta.png"; // Por defecto todas están cerradas
        
        // Si Monty ya abrió una puerta pero aún no decidiste cambiar o no
        if ($posibleCambio && $i == $posibleCambio && !$cambiar) {
            $img = "cabra.png";
        }
        
        // Si ya terminó el juego, muestro todo
        if ($cambiar) {
            if ($i == $ganadora) {
                $img = "coche.png";
            } else {
                $img = "cabra.png";
            }
        }
        
        // Cada puerta es un botón con su imagen
        echo '<div>';
        echo '<form action="index.php" method="get">';
        echo '<input type="hidden" name="puerta" value="'.$i.'">';
        echo '<button type="submit" style="background:none;border:none;">';
        echo '<img src="'.$img.'" alt="Puerta '.$i.'">';
        echo '</button>';
        echo '</form>';
        echo '</div>';
    }
    
    echo '</div>';
}

// LÓGICA PRINCIPAL DEL JUEGO
// Inicializo las estadísticas cuando empieza
inicializarEstadisticas();

// Si pulsaste el botón de reset, borro todo y recargo la página
if (isset($_GET['reset'])) {
    $_SESSION['ganadas_cambiando'] = 0;
    $_SESSION['ganadas_manteniendo'] = 0;
    $_SESSION['jugadas_cambiando'] = 0;
    $_SESSION['jugadas_manteniendo'] = 0;
    header("Location: index.php");
    exit;
}

// Recojo los datos que llegan por GET
$puertaElegida = $_GET["puerta"] ?? null;
$ganadora = $_GET["ganadora"] ?? null;
$posibleCambio = $_GET["posibleCambio"] ?? null;
$cambiar = $_GET["cambiar"] ?? null;

// Primera fase: el jugador elige una puerta por primera vez
if ($puertaElegida && !$ganadora) {
    $ganadora = rand(1, 3); // Decido aleatoriamente dónde está el coche
    $posibleCambio = elegirPuertaMonty($puertaElegida, $ganadora); // Monty abre una puerta
}

// Fase final: ya decidiste si cambias o no
if ($cambiar) {
    if ($cambiar == "si") {
        $puertaElegida = calcularCambio($puertaElegida, $posibleCambio); // Cambio a la otra puerta
    }
    
    // Compruebo si ganaste y actualizo las estadísticas
    $gano = ($puertaElegida == $ganadora);
    $estrategia = ($cambiar == "si") ? "cambio" : "mantuvo";
    actualizarEstadisticas($gano, $estrategia);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Monty Hall</title>
    <style>
    body { font-family: Arial, sans-serif; text-align: center; background: #f0f0f0; }
    h1 { color: #333; }
    .puertas { display: flex; justify-content: center; gap: 20px; margin: 20px 0; }
    .puertas img { 
        width: 200px; 
        height: 200px;
        object-fit: cover;
        transition: transform 0.2s;
        border: 3px solid #333;
        border-radius: 8px;
    }
    .puertas img:hover { transform: scale(1.1); }
    .stats { 
        background: #fff; 
        padding: 20px; 
        margin-top: 20px; 
        border-radius: 12px; 
        display: inline-block; 
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        border: 2px solid #333;
        max-width: 300px;
    }
    .stats h3 { margin-top: 0; color: #444; }
    .stats p { margin: 8px 0; font-weight: bold; }
    button {
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 5px;
        border: 2px solid #333;
        background: #fff;
        transition: all 0.2s;
    }
    button:hover {
        background: #333;
        color: #fff;
    }
</style>

</head>
<body>

<h1>Juego de Monty Hall</h1>

<?php
// Dibujo las tres puertas
generarPuertas($posibleCambio, $cambiar, $ganadora);
?>

<?php
// Mensajes de la fase intermedia (cuando Monty ya abrió una puerta)
if ($puertaElegida && !$cambiar && $ganadora) {
    echo "<h2>Has elegido la puerta $puertaElegida</h2>";
    echo "<h3>Monty abre la puerta $posibleCambio y aparece una cabra 🐐</h3>";
    echo "<h3>¿Quieres cambiar de puerta?</h3>";

    // Botones para decidir si cambiar o mantener
    echo '<form action="index.php" method="get">
            <input type="hidden" name="puerta" value="' . $puertaElegida . '">
            <input type="hidden" name="ganadora" value="' . $ganadora . '">
            <input type="hidden" name="posibleCambio" value="' . $posibleCambio . '">
            <button type="submit" name="cambiar" value="si">Cambiar</button>
            <button type="submit" name="cambiar" value="no">Mantener</button>
          </form>';
}

// Mensaje final cuando ya terminó el juego
if ($cambiar) {
    echo "<h2>Tu elección final es la puerta $puertaElegida</h2>";
    if ($puertaElegida == $ganadora) {
        echo "<h2>🎉 ¡Ganaste el coche 🚗!</h2>";
    } else {
        echo "<h2>😢 Te tocó una cabra 🐐</h2>";
    }

    // Botón para jugar otra vez
    echo '<form action="index.php" method="get">
            <button type="submit">Volver a jugar</button>
          </form>';
}
?>

<?php
// Muestro las estadísticas al final de la página
mostrarEstadisticas();
?>

</body>
</html>