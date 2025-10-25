<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Rutas de imágenes relativas
$IMG_PUERTA = 'img/door.png';
$IMG_CABRA  = 'img/goat.png';
$IMG_COCHE  = 'img/car.png';

// estadísticas
// stay_plays, stay_wins, switch_plays, switch_wins
if (!isset($_SESSION['estadisticas']) || !is_array($_SESSION['estadisticas'])) {
    $_SESSION['estadisticas'] = [
        'stay_plays'   => 0,
        'stay_wins'    => 0,
        'switch_plays' => 0,
        'switch_wins'  => 0
    ];
}

// Inicializar premio si no existe 
if (!isset($_SESSION['premio'])) {
    $_SESSION['premio'] = rand(1, 3);
}

// FUNCION
function porcentaje($ganadas, $jugadas) {
    if ($jugadas == 0) return "0%";
    return round(100 * $ganadas / $jugadas, 2) . "%";
}

// ACCIONES via GET 
if (isset($_GET['reset']) && $_GET['reset'] == '1') {
    $_SESSION['premio'] = rand(1, 3);
    unset($_SESSION['elegida'], $_SESSION['revelada'], $_SESSION['final'], $_SESSION['eleccion_final']);
    header('Location: index.php');
    exit;
}
// Reiniciar TODO (partida + estadísticas)
if (isset($_GET['reset_stats']) && $_GET['reset_stats'] == '1') {
    $_SESSION['premio'] = rand(1, 3);
    unset($_SESSION['elegida'], $_SESSION['revelada'], $_SESSION['final'], $_SESSION['eleccion_final']);
    $_SESSION['estadisticas'] = [
        'stay_plays'   => 0,
        'stay_wins'    => 0,
        'switch_plays' => 0,
        'switch_wins'  => 0
    ];
    header('Location: index.php');
    exit;
}

// Elección inicial del usuario
if (isset($_GET['choose'])) {
    $sel = intval($_GET['choose']);
    if ($sel >= 1 && $sel <= 3) {
        $_SESSION['elegida'] = $sel;
        // elegir una puerta con cabra para revelar (no el premio y no la elegida)
        $posibles = [];
        for ($i = 1; $i <= 3; $i++) {
            if ($i != $_SESSION['premio'] && $i != $_SESSION['elegida']) $posibles[] = $i;
        }
        $_SESSION['revelada'] = $posibles[array_rand($posibles)];
    }
    header('Location: index.php');
    exit;
}

// Decisión final: mantener o cambiar
if (isset($_GET['final']) && isset($_SESSION['elegida']) && isset($_SESSION['revelada'])) {
    $decision = $_GET['final']; // 'stay' o 'switch'
    $elegida = intval($_SESSION['elegida']);
    $revelada = intval($_SESSION['revelada']);
    $premio = intval($_SESSION['premio']);

    // actualizar estadísticas en sesión
    if ($decision === 'stay') {
        $eleccion_final = $elegida;
        $_SESSION['estadisticas']['stay_plays'] += 1;
        if ($eleccion_final === $premio) $_SESSION['estadisticas']['stay_wins'] += 1;
    } else {
        // encontrar la otra puerta cerrada
        $eleccion_final = null;
        for ($i = 1; $i <= 3; $i++) {
            if ($i != $elegida && $i != $revelada) {
                $eleccion_final = $i;
                break;
            }
        }
        if ($eleccion_final === null) $eleccion_final = $elegida;
        $_SESSION['estadisticas']['switch_plays'] += 1;
        if ($eleccion_final === $premio) $_SESSION['estadisticas']['switch_wins'] += 1;
    }

    // guardar resultado para mostrar
    $_SESSION['final'] = $decision;
    $_SESSION['eleccion_final'] = $eleccion_final;

    header('Location: index.php');
    exit;
}

// ESTADO PARA VISTA
$elegida = isset($_SESSION['elegida']) ? intval($_SESSION['elegida']) : null;
$revelada = isset($_SESSION['revelada']) ? intval($_SESSION['revelada']) : null;
$final = isset($_SESSION['final']) ? $_SESSION['final'] : null;
$eleccion_final = isset($_SESSION['eleccion_final']) ? intval($_SESSION['eleccion_final']) : null;
$premio = isset($_SESSION['premio']) ? intval($_SESSION['premio']) : null;
$estad = $_SESSION['estadisticas']; // alias para usar en la vista

// decidir si hay imágenes disponibles
$imgPuerta = file_exists(__DIR__ . '/' . $IMG_PUERTA) ? $IMG_PUERTA : null;
$imgCabra  = file_exists(__DIR__ . '/' . $IMG_CABRA)  ? $IMG_CABRA  : null;
$imgCoche  = file_exists(__DIR__ . '/' . $IMG_COCHE)  ? $IMG_COCHE  : null;

?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Monty Hall — Ismael Vargas Duque</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="contenedor">
    <header class="header">
      <h1>Monty Hall - Ismael Vargas Duque</h1>
      <div class="top-controls">
        <a class="btn" href="?reset=1">Reiniciar partida</a>
        <a class="btn secondary" href="?reset_stats=1">Reiniciar todo (stats)</a>
      </div>
    </header>
    <div class="puertas">
      <?php for ($i = 1; $i <= 3; $i++): 
          $esElegida = ($elegida === $i);
          $esRevelada = ($revelada === $i);
          $esEleccionFinal = ($eleccion_final === $i && $final !== null);

          // seleccionar imagen según estado
          if ($final === null) {
              if ($esRevelada) { $img = $imgCabra; $label = 'Puerta abierta (cabra)'; }
              else { $img = $imgPuerta; $label = $esElegida ? 'Tu elección' : 'Puerta cerrada'; }
          } else {
              if ($i === $premio) { $img = $imgCoche; $label = 'Coche Fantástico'; }
              else { $img = $imgCabra; $label = 'Cabra'; }
              if ($esEleccionFinal) $label .= ' — Tu elección final';
          }
      ?>
        <div class="puerta">
          <?php if ($img): ?>
            <img src="<?=htmlspecialchars($img)?>" alt="Puerta <?=$i?>">
          <?php else: ?>
            <div class="placeholder">Imagen no encontrada</div>
          <?php endif; ?>

          <strong>Puerta <?=$i?></strong>
          <div class="small"><?=$label?></div>

          <?php if ($final === null): ?>
              <?php if ($elegida === null): ?>
                <div class="accion"><a class="btn" href="?choose=<?=$i?>">Elegir puerta <?=$i?></a></div>
              <?php else: ?>
                <div class="small">
                  <?php if ($esRevelada) echo '(Abierta)';
                        elseif ($esElegida) echo '(Tu elección)';
                        else echo '(Cerrada)'; ?>
                </div>
              <?php endif; ?>
          <?php endif; ?>
        </div>
      <?php endfor; ?>
    </div>

    <?php if ($elegida === null): ?>
      <div class="tarjeta"><p class="small">Haz clic en una puerta para empezar.</p></div>

    <?php elseif ($final === null): ?>
      <div class="tarjeta">
        <p>He abierto una puerta con cabra. ¿Mantienes o cambias?</p>
        <div class="controls">
          <a class="btn" href="?final=stay">Mantener</a>
          <a class="btn secondary" href="?final=switch">Cambiar</a>
        </div>
        <p class="small">Elegida: <strong><?=htmlspecialchars($elegida)?></strong> — Revelada: <strong><?=htmlspecialchars($revelada)?></strong></p>
      </div>

    <?php else: ?>
      <div class="resultado">
        <?php if ($eleccion_final === $premio): ?>
          <h3>¡Has ganado! 🎉</h3>
          <p>Tu elección final (Puerta <?=$eleccion_final?>) tenía el coche.</p>
        <?php else: ?>
          <h3>Perdiste. 😅</h3>
          <p>Elegiste la Puerta <strong><?=$eleccion_final?></strong>. El coche estaba en la Puerta <strong><?=$premio?></strong>.</p>
        <?php endif; ?>
        <div class="controls"><a class="btn" href="?reset=1">Jugar otra vez</a></div>
      </div>
    <?php endif; ?>

    <!-- Tabla de estadísticas -->
    <div class="tarjeta tabla-stats">
      <h3>Estadísticas</h3>
      <table>
        <thead>
          <tr><th>Estrategia</th><th>Victorias</th><th>Partidas</th><th>Porcentaje</th></tr>
        </thead>
        <tbody>
          <tr>
            <td>Mantener</td>
            <td><?= intval($estad['stay_wins']) ?></td>
            <td><?= intval($estad['stay_plays']) ?></td>
            <td><?= porcentaje($estad['stay_wins'], $estad['stay_plays']) ?></td>
          </tr>
          <tr>
            <td>Cambiar</td>
            <td><?= intval($estad['switch_wins']) ?></td>
            <td><?= intval($estad['switch_plays']) ?></td>
            <td><?= porcentaje($estad['switch_wins'], $estad['switch_plays']) ?></td>
          </tr>
        </tbody>
      </table>
      <br>
      <p class="small">Nota: estadísticas guardadas en la sesión del navegador; si cierras la sesión se perderán. Usa "Reiniciar todo" para poner a cero.</p>
    </div>
  </div>
</body>
</html>
