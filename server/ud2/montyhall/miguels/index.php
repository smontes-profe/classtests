<?php
// Iniciar sesión
session_start();

// Seleccionamos los tipos de errores y que se muestren por
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicializar historial si no existe
if (!isset($_SESSION['history'])) {
  $_SESSION['history'] = [
    'games' => 0,
    'wins' => 0,
    'losses' => 0,
    'changed_wins' => 0,
    'changed_games' => 0,
    'stayed_wins' => 0,
    'stayed_games' => 0
  ];
}

// Reset del juego
if (isset($_GET['reset'])) {
  unset($_SESSION['door']);
  unset($_SESSION['winnerDoor']);
  unset($_SESSION['presenterDoor']);
  unset($_SESSION['choice']);
  unset($_SESSION['won']);
  unset($_SESSION['changed']);
  header('Location: index.php');
  exit;
}

// Generar puerta ganadora aleatoria
function randomDoor()
{
  return rand(1, 3);
}

// Determinar qué puerta abre el presentador
function compareDoorToOpen($userOption, $doorWin)
{
  $candidates = array_diff([1, 2, 3], [$userOption, $doorWin]);
  $candidates = array_values($candidates);
  return $candidates[array_rand($candidates)];
}

// Cambiar puerta del usuario
function changeDoorUser($userOption, $doorOpen)
{
  $candidates = array_diff([1, 2, 3], [$userOption, $doorOpen]);
  return array_values($candidates)[0];
}

// Procesar elección inicial de puerta
if (isset($_GET['door']) && !isset($_SESSION['door'])) {
  $_SESSION['door'] = (int) $_GET['door'];
  $_SESSION['winnerDoor'] = randomDoor();
  $_SESSION['presenterDoor'] = compareDoorToOpen($_SESSION['door'], $_SESSION['winnerDoor']);
}

// Procesar decisión de cambiar o mantener
if (isset($_GET['choice']) && !isset($_SESSION['choice'])) {
  $_SESSION['choice'] = $_GET['choice'];
  
  if ($_GET['choice'] === 'change') {
    // Usuario cambia de puerta
    $_SESSION['changed'] = true;
    $newDoor = changeDoorUser($_SESSION['door'], $_SESSION['presenterDoor']);
    $_SESSION['finalDoor'] = $newDoor;
  } else {
    // Usuario mantiene su puerta
    $_SESSION['changed'] = false;
    $_SESSION['finalDoor'] = $_SESSION['door'];
  }
  
  // Determinar si ganó
  $_SESSION['won'] = ($_SESSION['finalDoor'] === $_SESSION['winnerDoor']);
  
  // Actualizar historial
  $_SESSION['history']['games']++;
  if ($_SESSION['won']) {
    $_SESSION['history']['wins']++;
  } else {
    $_SESSION['history']['losses']++;
  }
  
  // Estadísticas por estrategia
  if ($_SESSION['changed']) {
    $_SESSION['history']['changed_games']++;
    if ($_SESSION['won']) {
      $_SESSION['history']['changed_wins']++;
    }
  } else {
    $_SESSION['history']['stayed_games']++;
    if ($_SESSION['won']) {
      $_SESSION['history']['stayed_wins']++;
    }
  }
}

// Variables para el template
$userOptionDoor = $_SESSION['door'] ?? null;
$winnerDoor = $_SESSION['winnerDoor'] ?? null;
$presenterDoor = $_SESSION['presenterDoor'] ?? null;
$choice = $_SESSION['choice'] ?? null;
$won = $_SESSION['won'] ?? null;
$changed = $_SESSION['changed'] ?? null;
$finalDoor = $_SESSION['finalDoor'] ?? null;
$history = $_SESSION['history'];

// Generar mensaje del presentador
if (!$userOptionDoor) {
  $mensaje = "¡Bienvenido al problema de Monty Hall! Hay tres puertas: detrás de una hay un premio, detrás de las otras dos hay cabras. Elige una puerta.";
} elseif ($userOptionDoor && !$choice) {
  $mensaje = "Has elegido la puerta <strong>{$userOptionDoor}</strong>. Voy a abrir la puerta <strong>{$presenterDoor}</strong>, que tiene una cabra. ¿Quieres mantener tu elección o cambiar a la otra puerta cerrada?";
} elseif ($choice) {
  $strategyText = $changed ? "cambiaste a la puerta <strong>{$finalDoor}</strong>" : "mantuviste la puerta <strong>{$finalDoor}</strong>";
  if ($won) {
    $mensaje = "¡Felicidades! {$strategyText} y <strong>¡HAS GANADO!</strong> La puerta ganadora era la <strong>{$winnerDoor}</strong>. 🎉";
  } else {
    $mensaje = "Lo siento, {$strategyText} pero <strong>has perdido</strong>. La puerta ganadora era la <strong>{$winnerDoor}</strong>. 😢";
  }
}

// Calcular porcentajes para estadísticas
$winRate = $history['games'] > 0 ? round(($history['wins'] / $history['games']) * 100, 1) : 0;
$changedWinRate = $history['changed_games'] > 0 ? round(($history['changed_wins'] / $history['changed_games']) * 100, 1) : 0;
$stayedWinRate = $history['stayed_games'] > 0 ? round(($history['stayed_wins'] / $history['stayed_games']) * 100, 1) : 0;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Problema de Monty Hall</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    .doors-grid .door-card {
      transition: transform .25s ease, filter .25s ease, box-shadow .25s ease;
      border: 0;
      background: transparent;
    }

    .doors-grid .door-card:hover:not(.disabled) {
      transform: translateY(-4px);
      filter: brightness(1.03);
      box-shadow: 0 0.75rem 1.25rem rgba(0, 0, 0, .12);
    }

    .doors-grid .door-card.disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }

    .door-img {
      width: 100%;
      height: auto;
      aspect-ratio: 3/5;
      object-fit: contain;
      display: block;
      user-select: none;
    }

    .presenter img {
      max-width: 560px;
      height: auto;
      border-radius: .75rem;
    }

    .brand-bg {
      background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    }

    .page-title {
      letter-spacing: .5px;
    }

    .stat-card {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border-radius: 1rem;
    }

    .badge-win {
      background-color: #28a745;
    }

    .badge-lose {
      background-color: #dc3545;
    }
  </style>
</head>

<body class="brand-bg">
  <header class="py-4 border-bottom bg-white shadow-sm">
    <div class="container">
      <h1 class="h3 m-0 page-title">🎪 Problema de Monty Hall</h1>
      <?php if ($userOptionDoor): ?>
        <p class="text-muted mb-0">Tu elección inicial: <strong>Puerta <?= $userOptionDoor ?></strong></p>
      <?php endif; ?>
    </div>
  </header>

  <main class="py-5">
    <div class="container">

      <!-- Estadísticas -->
      <?php if ($history['games'] > 0): ?>
        <div class="row mb-4">
          <div class="col-12">
            <div class="stat-card p-4 shadow">
              <h3 class="h5 mb-3">📊 Historial de Partidas</h3>
              <div class="row g-3">
                <div class="col-6 col-md-3">
                  <div class="text-center">
                    <div class="h2 mb-0"><?= $history['games'] ?></div>
                    <small>Partidas</small>
                  </div>
                </div>
                <div class="col-6 col-md-3">
                  <div class="text-center">
                    <div class="h2 mb-0"><?= $history['wins'] ?></div>
                    <small>Victorias (<?= $winRate ?>%)</small>
                  </div>
                </div>
                <div class="col-6 col-md-3">
                  <div class="text-center">
                    <div class="h2 mb-0"><?= $changedWinRate ?>%</div>
                    <small>Éxito cambiando (<?= $history['changed_games'] ?> veces)</small>
                  </div>
                </div>
                <div class="col-6 col-md-3">
                  <div class="text-center">
                    <div class="h2 mb-0"><?= $stayedWinRate ?>%</div>
                    <small>Éxito manteniendo (<?= $history['stayed_games'] ?> veces)</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <!-- Puertas -->
      <form action="index.php" method="GET" class="doors-grid">
        <div class="row g-4 justify-content-center">

          <?php for ($doorNum = 1; $doorNum <= 3; $doorNum++): ?>
            <div class="col-12 col-sm-6 col-md-4">
              <div class="card door-card h-100 text-center p-3 <?= ($userOptionDoor || $choice) ? 'disabled' : '' ?>">
                <?php
                $doorImage = 'img/doorClose.png';
                $doorAlt = "Puerta {$doorNum} cerrada";
                $doorLabel = '';

                if ($userOptionDoor === $doorNum) {
                  $doorImage = 'img/doorUser.png';
                  $doorLabel = '<span class="badge bg-primary mt-2">Tu elección</span>';
                } elseif ($presenterDoor === $doorNum) {
                  $doorImage = 'img/presentadorDoor.jpg';
                  $doorLabel = '<span class="badge bg-warning text-dark mt-2">Cabra 🐐</span>';
                } elseif ($choice && $winnerDoor === $doorNum) {
                  $doorImage = 'img/doorClose.png';
                  $doorLabel = '<span class="badge badge-win mt-2">¡Premio! 🎁</span>';
                }
                ?>
                <img src="<?= $doorImage ?>" alt="<?= $doorAlt ?>" class="door-img mx-auto" draggable="false">
                <?= $doorLabel ?>
                <div class="mt-3">
                  <?php if (!$userOptionDoor && !$choice): ?>
                    <button class="btn btn-primary btn-lg px-4" type="submit" name="door" value="<?= $doorNum ?>">
                      Puerta <?= $doorNum ?>
                    </button>
                  <?php else: ?>
                    <button class="btn btn-secondary btn-lg px-4" type="button" disabled>
                      Puerta <?= $doorNum ?>
                    </button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endfor; ?>

        </div>
      </form>

      <!-- Presentador -->
      <section class="presenter mt-5">
        <div class="container">
          <div class="row align-items-center g-4">
            <div class="col-12 col-md-auto text-center">
              <img src="img/presentador.png" alt="Presentador del juego" class="img-fluid rounded-3 shadow-sm" style="max-width: 620px;" />
            </div>

            <div class="col">
              <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                  <p class="mb-0 fs-5" id="conversacion" role="status" aria-live="polite">
                    <?= $mensaje ?>
                  </p>

                  <?php if ($choice === null && $userOptionDoor): ?>
                    <div class="mt-4">
                      <div class="d-grid gap-2 d-sm-flex">
                        <a href="?choice=stay" class="btn btn-primary btn-lg px-4">
                          Mantener mi puerta
                        </a>
                        <a href="?choice=change" class="btn btn-outline-primary btn-lg px-4">
                          Cambiar de puerta
                        </a>
                      </div>
                    </div>
                  <?php elseif ($choice !== null): ?>
                    <div class="mt-4">
                      <a class="btn btn-success btn-lg px-4" href="?reset=1">
                        🔄 Jugar otra vez
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main>

  <footer class="py-4 text-center text-muted small border-top bg-white mt-5">
    <div class="container">
      <p class="mb-1">&copy; <?= date('Y') ?> Problema de Monty Hall</p>
      <p class="mb-0"><small>💡 Dato curioso: Matemáticamente, cambiar de puerta da 66.7% de probabilidad de ganar vs 33.3% al mantener.</small></p>
    </div>
  </footer>

</body>

</html>