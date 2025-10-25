<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar sesión para poder guardar estadísticas del jugador
session_start();

// Si no existen estadísticas aún, las inicializamos
if (!isset($_SESSION['estadisticas'])) {
    $_SESSION['estadisticas'] = [
        'partidas_totales' => 0,       // Número total de partidas jugadas
        'ganadas_manteniendo' => 0,    // Veces que ganó manteniendo su elección
        'ganadas_cambiando' => 0       // Veces que ganó cambiando de puerta
    ];
}

// Función que inicializa el juego (coloca el premio detrás de una de las tres puertas)
function inicializarJuego() {
    // Creamos un array con 3 puertas que por defecto tienen cabra
    $puertas = ['cabra', 'cabra', 'cabra'];
    
    // Elegimos una puerta aleatoria para colocar el premio (0, 1 o 2)
    $premio_index = rand(0, 2);
    $puertas[$premio_index] = 'premio';
    
    return $puertas; // Devolvemos el array con el premio colocado
}

// Función que revela una cabra (una puerta que no eligió el usuario y que no tiene premio)
function revelarCabra($puertas, $eleccion_usuario) {
    $puertas_disponibles = [];
    
    // Recorremos las 3 puertas
    for ($i = 0; $i < 3; $i++) {
        // Agregamos las puertas con cabra que no eligió el jugador
        if ($i != $eleccion_usuario && $puertas[$i] == 'cabra') {
            $puertas_disponibles[] = $i;
        }
    }
    
    // Elegimos aleatoriamente una de las puertas con cabra para revelar
    return $puertas_disponibles[array_rand($puertas_disponibles)];
}

// Función que muestra las puertas en pantalla según el estado del juego
function mostrarPuertas($puertas, $estado_juego, $eleccion_usuario = null, $puerta_revelada = null) {
    echo '<div class="puertas">';
    
    for ($i = 0; $i < 3; $i++) {
        $clase_puerta = 'puerta';
        
        // Si esta es la puerta que eligió el usuario, la destacamos
        if ($i == $eleccion_usuario) {
            $clase_puerta .= ' elegida';
        }
        
        echo '<div class="' . $clase_puerta . '">';
        
        // En el estado inicial, las puertas están cerradas
        if ($estado_juego == 'inicio') {
            echo '<a href="?elegir=' . $i . '">';
            echo '🚪 Puerta ' . ($i + 1);
            echo '</a>';
        } 
        // En el estado "revelar", mostramos la cabra en la puerta abierta
        elseif ($estado_juego == 'revelar') {
            if ($i == $puerta_revelada) {
                echo '🐐 Cabra!';
            } else {
                echo '🚪 Puerta ' . ($i + 1);
            }
        }
        // En el estado final, mostramos qué había detrás de cada puerta
        elseif ($estado_juego == 'final') {
            if ($puertas[$i] == 'premio') {
                echo '🏆 PREMIO!';
            } else {
                echo '🐐 Cabra';
            }
        }
        
        echo '</div>';
    }
    
    echo '</div>';
}

// Función para mostrar las estadísticas de las partidas
function mostrarEstadisticas() {
    $stats = $_SESSION['estadisticas'];
    $total = $stats['partidas_totales'];
    
    // Evitamos división por cero al calcular porcentajes
    $porcentaje_mantener = $total > 0 ? round(($stats['ganadas_manteniendo'] / $total) * 100, 1) : 0;
    $porcentaje_cambiar = $total > 0 ? round(($stats['ganadas_cambiando'] / $total) * 100, 1) : 0;
    
    echo '<div class="estadisticas">';
    echo '<h3>📊 Estadísticas</h3>';
    echo '<p>Partidas jugadas: ' . $total . '</p>';
    echo '<p>Ganadas manteniéndose: ' . $stats['ganadas_manteniendo'] . ' (' . $porcentaje_mantener . '%)</p>';
    echo '<p>Ganadas cambiando: ' . $stats['ganadas_cambiando'] . ' (' . $porcentaje_cambiar . '%)</p>';
    echo '</div>';
}


// Variables iniciales
$mensaje = '';
$estado = 'inicio';
$puertas = [];
$eleccion_usuario = null;
$puerta_revelada = null;

// Si el usuario hace clic en una puerta (elige una)
if (isset($_GET['elegir'])) {
    $eleccion_usuario = intval($_GET['elegir']); // Convertimos a número
    $puertas = inicializarJuego();               // Colocamos el premio
    $puerta_revelada = revelarCabra($puertas, $eleccion_usuario); // Mostramos una cabra
    $estado = 'revelar';
    $mensaje = 'He revelado una cabra. ¿Quieres mantener tu elección o cambiar?';
    
// Si el usuario decide mantenerse con su elección
} elseif (isset($_GET['mantener'])) {
    $puertas = $_SESSION['puertas_actuales'];
    $eleccion_usuario = $_SESSION['eleccion_actual'];
    $estado = 'final';
    
    // Comprobamos si ganó
    if ($puertas[$eleccion_usuario] == 'premio') {
        $mensaje = '🎉 ¡GANASTE! Elegiste bien mantenerte.';
        $_SESSION['estadisticas']['ganadas_manteniendo']++;
    } else {
        $mensaje = '😞 Perdiste. Había una cabra.';
    }
    $_SESSION['estadisticas']['partidas_totales']++;
    
// Si el usuario decide cambiar de puerta
} elseif (isset($_GET['cambiar'])) {
    $puertas = $_SESSION['puertas_actuales'];
    $eleccion_original = $_SESSION['eleccion_actual'];
    $puerta_revelada = $_SESSION['revelada_actual'];
    
    // Buscamos la otra puerta disponible 
    for ($i = 0; $i < 3; $i++) {
        if ($i != $eleccion_original && $i != $puerta_revelada) {
            $eleccion_usuario = $i;
            break;
        }
    }
    
    $estado = 'final';
    
    // Comprobamos si ganó al cambiar
    if ($puertas[$eleccion_usuario] == 'premio') {
        $mensaje = '🎉 ¡GANASTE! Elegiste bien cambiar.';
        $_SESSION['estadisticas']['ganadas_cambiando']++;
    } else {
        $mensaje = '😞 Perdiste. Había una cabra.';
    }
    $_SESSION['estadisticas']['partidas_totales']++;
}

// Guardamos el estado del juego en la sesión para poder continuar
if ($estado == 'revelar') {
    $_SESSION['puertas_actuales'] = $puertas;
    $_SESSION['eleccion_actual'] = $eleccion_usuario;
    $_SESSION['revelada_actual'] = $puerta_revelada;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monty Hall Simple</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #f0f8ff;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #3366cc;
            text-align: center;
        }
        /* --- Estilos para las puertas --- */
        .puertas {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        .puerta {
            padding: 20px;
            border: 3px solid #3366cc;
            border-radius: 10px;
            background: #e6f2ff;
            min-width: 120px;
            text-align: center;
            font-weight: bold;
        }
        .puerta.elegida {
            border-color: #ff6600;
            background: #fff0e6;
        }
        .puerta a {
            text-decoration: none;
            color: #3366cc;
            display: block;
        }
       
        .controles {
            text-align: center;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            background: #3366cc;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background: #254e9e;
        }
        .estadisticas {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            border-left: 4px solid #3366cc;
        }
        .mensaje {
            background: #fff3cd;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚪 Problema de Monty Hall 🐐</h1>
        
        <?php if ($mensaje): ?>
            <!-- Muestra el mensaje de resultado o de aviso -->
            <div class="mensaje"><?php echo $mensaje; ?></div>
        <?php endif; ?>
        
        <?php
        // Mostramos las puertas dependiendo del estado actual
        mostrarPuertas($puertas, $estado, $eleccion_usuario, $puerta_revelada);
        ?>
        
        <div class="controles">
            <?php if ($estado == 'revelar'): ?>
                <!-- Después de revelar la cabra, el usuario elige si cambiar o mantener -->
                <a href="?mantener=1" class="btn">MANTENER elección</a>
                <a href="?cambiar=1" class="btn">CAMBIAR de puerta</a>
            <?php elseif ($estado == 'final'): ?>
                <!-- Opción para volver a jugar -->
                <a href="?" class="btn">JUGAR DE NUEVO</a>
            <?php endif; ?>
        </div>
        
        <?php
        // Mostrar las estadísticas acumuladas
        mostrarEstadisticas();
        ?>
        
        <!-- Sección extra para mostrar uso de arrays, operadores, condicionales y bucles -->
        <div style="margin-top: 30px; padding: 15px; background: #e8f4f8; border-radius: 5px;">
            <h3>💡 Datos del Juego</h3>
            <?php
            // ARRAY: Probabilidades teóricas
            $probabilidades = [
                "Mantener" => "33.3%",
                "Cambiar" => "66.7%"
            ];
            
            // OPERADORES: Cálculos de probabilidad
            $prob_teorica_mantener = (1/3) * 100;
            $prob_teorica_cambiar = (2/3) * 100;
            
            // CONDICIONAL: Determinar cuál estrategia es mejor
            $mejor_estrategia = ($prob_teorica_cambiar > $prob_teorica_mantener) ? "CAMBIAR" : "MANTENER";
            
            echo "<p>Probabilidad teórica manteniéndose: " . round($prob_teorica_mantener, 1) . "%</p>";
            echo "<p>Probabilidad teórica cambiando: " . round($prob_teorica_cambiar, 1) . "%</p>";
            echo "<p>Mejor estrategia: <strong>" . $mejor_estrategia . "</strong></p>";
            
            // BUCLE: Recorremos el array y mostramos los valores
            echo "<p>Resumen probabilidades: ";
            foreach ($probabilidades as $estrategia => $prob) {
                echo $estrategia . "=" . $prob . " ";
            }
            echo "</p>";
            ?>
        </div>
    </div>
</body>
</html>
