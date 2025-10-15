<?php
// ==============================================
// CONFIGURACIÓN Y DEFINICIÓN DE VARIABLES
// ==============================================

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// --- VARIABLES DE SESIÓN (Estado del juego) ---
$puerta_elegida = $_SESSION['elegida'] ?? null;
$puerta_premio = $_SESSION['premio'] ?? null;
$puerta_abierta = $_SESSION['abierta'] ?? null;
$puerta_alternativa = $_SESSION['otra'] ?? null;

// --- VARIABLES DE ESTADÍSTICAS ---
if (!isset($_SESSION['stats'])) {
    $_SESSION['stats'] = [
        'gano_manteniendo' => 0,
        'gano_cambiando' => 0,
        'total_manteniendo' => 0,
        'total_cambiando' => 0
    ];
}

$victorias_manteniendo = $_SESSION['stats']['gano_manteniendo'];
$victorias_cambiando = $_SESSION['stats']['gano_cambiando'];
$intentos_manteniendo = $_SESSION['stats']['total_manteniendo'];
$intentos_cambiando = $_SESSION['stats']['total_cambiando'];
$intentos_totales = $intentos_manteniendo + $intentos_cambiando;

// --- VARIABLES DE CONTROL ---
$mensaje = '';
$fase = 'elegir';

// --- VARIABLES DE BOTONES ---
$boton_elegir = isset($_GET['elegir']);
$boton_accion = isset($_GET['accion']);
$boton_reset = isset($_GET['reset']);

// --- VARIABLES DE EJEMPLO (REQUERIDAS) ---
$ejemploArray = ['PHP', 'HTML', 'CSS'];
$suma = 10 + 5;
$comparacion = (5 > 3);

// ==============================================
// LÓGICA DEL JUEGO
// ==============================================

// PASO 1: Usuario elige puerta
if ($boton_elegir) {
    $puerta_elegida = $_GET['elegir'];
    $_SESSION['elegida'] = $puerta_elegida;
    
    $puerta_premio = rand(1, 3);
    $_SESSION['premio'] = $puerta_premio;
    
    // Abrir una puerta con cabra (no la elegida, no la del premio)
    $opciones = [1, 2, 3];
    foreach ($opciones as $key => $valor) {
        if ($valor == $puerta_elegida || $valor == $puerta_premio) {
            unset($opciones[$key]);
        }
    }
    $opciones = array_values($opciones);
    $puerta_abierta = (count($opciones) > 1) ? $opciones[rand(0, 1)] : $opciones[0];
    $_SESSION['abierta'] = $puerta_abierta;
    
    // Calcular la otra puerta disponible
    foreach ([1, 2, 3] as $p) {
        if ($p != $puerta_elegida && $p != $puerta_abierta) {
            $puerta_alternativa = $p;
            $_SESSION['otra'] = $puerta_alternativa;
        }
    }
    
    $fase = 'decidir';
    $mensaje = "Elegiste la puerta {$puerta_elegida}. Abrí la puerta {$puerta_abierta} (cabra). ¿Mantienes o cambias a la {$puerta_alternativa}?";
}

// PASO 2: Usuario decide mantener o cambiar
if ($boton_accion) {
    $accion = $_GET['accion'];
    $puerta_final = ($accion == 'mantener') ? $puerta_elegida : $puerta_alternativa;
    $gano = ($puerta_final == $puerta_premio);
    
    // Actualizar estadísticas
    if ($accion == 'mantener') {
        $_SESSION['stats']['total_manteniendo']++;
        if ($gano) $_SESSION['stats']['gano_manteniendo']++;
    } else {
        $_SESSION['stats']['total_cambiando']++;
        if ($gano) $_SESSION['stats']['gano_cambiando']++;
    }
    
    // Actualizar variables locales
    $victorias_manteniendo = $_SESSION['stats']['gano_manteniendo'];
    $victorias_cambiando = $_SESSION['stats']['gano_cambiando'];
    $intentos_manteniendo = $_SESSION['stats']['total_manteniendo'];
    $intentos_cambiando = $_SESSION['stats']['total_cambiando'];
    $intentos_totales = $intentos_manteniendo + $intentos_cambiando;
    
    $fase = 'final';
    $mensaje = $gano ? "¡GANASTE! El coche estaba en la {$puerta_premio}" : "Perdiste. El coche estaba en la {$puerta_premio}";
}

// PASO 3: Resetear juego
if ($boton_reset) {
    unset($_SESSION['elegida'], $_SESSION['premio'], $_SESSION['abierta'], $_SESSION['otra']);
    header('Location: index.php');
    exit;
}

// Calcular porcentajes
$porcentaje_manteniendo = ($intentos_manteniendo > 0) ? round(($victorias_manteniendo / $intentos_manteniendo) * 100, 1) : 0;
$porcentaje_cambiando = ($intentos_cambiando > 0) ? round(($victorias_cambiando / $intentos_cambiando) * 100, 1) : 0;

// PASO 4: Resetear estadísticas
if (isset($_GET['reset_stats'])) {
    $_SESSION['stats'] = [
        'gano_manteniendo' => 0,
        'gano_cambiando' => 0,
        'total_manteniendo' => 0,
        'total_cambiando' => 0
    ];
    header('Location: index.php');
    exit;
}

?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Monty Hall</title>
<style>
:root {
    --card-bg: #f7f7f8;
    --accent: #2b6cb0;
    --success: #48bb78;
    --danger: #f56565;
    --warning: #ed8936;
}

body {
    font-family: system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial;
    margin: 0;
    background-color: #474747ff;
    min-height: 100vh;
    color: #222;
}

.container {
    max-width: 1100px;
    margin: 40px auto;
    padding: 20px;
    background: white;
    border-radius: 2px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

h1 {
    text-align: center;
    margin-bottom: 24px;
    color: #764ba2;
    font-size: 2.5rem;
}

.stats-panel {
    background-color: #474747ff;
    color: white;
    padding: 20px;
    border-radius: 2px;
    margin-bottom: 30px;
    text-align: center;
}

.stats-panel h3 {
    margin: 0 0 15px 0;
    font-size: 1.4rem;
}

.stat-row {
    padding: 8px 0;
    font-size: 1.1rem;
}

.mensaje-info {
    background: #bee3f8;
    color: #2c5282;
    padding: 15px 20px;
    border-radius: 2px;
    margin-bottom: 20px;
    text-align: center;
    font-size: 1.1rem;
}

.doors {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.door {
    background: var(--card-bg);
    padding: 16px;
    border-radius: 2px;
    box-shadow: 0 6px 18px rgba(20, 30, 50, 0.06);
    text-align: center;
    flex: 0 1 280px;
}

.door h2 {
    margin: 0 0 12px;
    font-size: 1.3rem;
    color: #764ba2;
}

.door img {
    width: 100%;
    max-width: 200px;
    height: 280px;
    border-radius: 2px;
    display: block;
    margin: 0 auto 12px;
    object-fit: cover;
}

.overlay {
    position: relative;
}

.overlay-badge {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 15px 25px;
    border-radius: 2px;
    font-size: 1.5rem;
    font-weight: bold;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

.overlay-badge.premio {
    background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
    color: #744210;
}

.overlay-badge.cabra {
    background: linear-gradient(135deg, #fc8181 0%, #f56565 100%);
    color: white;
}

.badge-elegida {
    display: inline-block;
    background: var(--success);
    color: white;
    padding: 8px 16px;
    border-radius: 2px;
    font-weight: 600;
}

.badge-abierta {
    display: inline-block;
    background: #e53e3e;
    color: white;
    padding: 8px 16px;
    border-radius: 2px;
    font-weight: 600;
}

.btn {
    display: inline-block;
    padding: 12px 24px;
    border-radius: 2px;
    border: none;
    background: var(--accent);
    color: white;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    font-size: 1rem;
}

.btn:hover {
    background: #2c5282;
}

.btn-mantener {
    background: var(--success);
}

.btn-mantener:hover {
    background: #38a169;
}

.btn-cambiar {
    background: var(--warning);
}

.btn-cambiar:hover {
    background: #dd6b20;
}

.btn-reset {
    background-color: #474747ff;
}

.decision-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 30px 0;
    flex-wrap: wrap;
}

.debug-info {
    text-align: center;
    margin-top: 40px;
    padding: 10px;
    background: #f7fafc;
    border-radius: 2px;
    color: #718096;
}
</style>
</head>
<body>
    <div class="container">
        <h1>🎪 Monty Hall 🎪</h1>
        
        <!-- Estadísticas -->
        <div class="stats-panel">
            <h3>Estadísticas</h3>
            <div class="stat-row">Manteniendo: <?php echo $victorias_manteniendo; ?>/<?php echo $intentos_manteniendo; ?> (<?php echo $porcentaje_manteniendo; ?>%)</div>
            <div class="stat-row">Cambiando: <?php echo $victorias_cambiando; ?>/<?php echo $intentos_cambiando; ?> (<?php echo $porcentaje_cambiando; ?>%)</div>
            <div style="margin-top: 15px;">
                <a href="?reset_stats=1" class="btn btn-reset" onclick="return confirm('¿Seguro que quieres reiniciar las estadísticas?')">🔄 Reiniciar estadísticas</a>
            </div>
        </div>
        
        <?php if ($mensaje): ?>
            <div class="mensaje-info"><?php echo $mensaje; ?></div>
        <?php endif; ?>
        
        <!-- Las 3 puertas -->
        <div class="doors">
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <div class="door">
                    <h2>Puerta <?php echo $i; ?></h2>
                    <div class="overlay">
                        <?php
                        // Mostrar imagen según el estado
                        $img = 'img/LORCA-ANTRACITA-scaled-1-removebg-preview.png';
                        $badge = '';
                        
                        if ($fase == 'decidir' && $i == $puerta_abierta) {
                            $img = './img/Cabra.jfif';
                            $badge = '<div class="overlay-badge cabra">Cabra</div>';
                        } elseif ($fase == 'final') {
                            if ($i == $puerta_premio) {
                                $img = './img/CyberTruck.jfif';
                                $badge = '<div class="overlay-badge premio">COCHE</div>';
                            } else {
                                $img = './img/Cabra.jfif';
                                $badge = '<div class="overlay-badge cabra">Cabra</div>';
                            }
                        }
                        ?>
                        <img src="<?php echo $img; ?>" alt="Puerta <?php echo $i; ?>">
                        <?php echo $badge; ?>
                    </div>
                    
                    <?php if ($fase == 'elegir'): ?>
                        <a href="?elegir=<?php echo $i; ?>" class="btn">Elegir</a>
                    <?php elseif ($fase == 'decidir' && $i == $puerta_elegida): ?>
                        <span class="badge-elegida">✓ Tu elección</span>
                    <?php elseif ($fase == 'decidir' && $i == $puerta_abierta): ?>
                        <span class="badge-abierta">Abierta</span>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
        
        <!-- Botones de decisión -->
        <?php if ($fase == 'decidir'): ?>
            <div class="decision-buttons">
                <a href="?accion=mantener" class="btn btn-mantener">Mantener puerta <?php echo $puerta_elegida; ?></a>
                <a href="?accion=cambiar" class="btn btn-cambiar">Cambiar a puerta <?php echo $puerta_alternativa; ?></a>
            </div>
        <?php endif; ?>
        
        <?php if ($fase == 'final'): ?>
            <div class="decision-buttons">
                <a href="?reset=1" class="btn btn-reset">🔄 Jugar de nuevo</a>
            </div>
        <?php endif; ?>
        
        <!-- Variables de ejemplo -->
        <div class="debug-info">
            <small>Tech: <?php foreach($ejemploArray as $t) echo $t . ' '; ?> | Suma: <?php echo $suma; ?> | Comparación: <?php echo $comparacion ? 'Si' : 'No'; ?></small>
        </div>
    </div>
</body>
</html>