<?php
// Mostrar todos los errores con error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Estadísticas usando sesión verificando si es Null o no
session_start();
if (!isset($_SESSION['mantener_ganadas'])) $_SESSION['mantener_ganadas'] = 0;
if (!isset($_SESSION['mantener_total'])) $_SESSION['mantener_total'] = 0;
if (!isset($_SESSION['cambiar_ganadas'])) $_SESSION['cambiar_ganadas'] = 0;
if (!isset($_SESSION['cambiar_total'])) $_SESSION['cambiar_total'] = 0;

// Variables para el juego donde se guarda el estado de las puertas
$step = isset($_GET['step']) ? $_GET['step'] : 1;
$eleccion = isset($_GET['puerta']) ? intval($_GET['puerta']) : null;
$puertaCabra = isset($_GET['cabra']) ? intval($_GET['cabra']) : null;
$accion = isset($_GET['accion']) ? $_GET['accion'] : null;

// Solo barajar puertas al inicio del juego
if (!isset($_SESSION['puertas']) || $step == 1) {
	$_SESSION['puertas'] = ['cabra', 'cabra', 'coche'];
	shuffle($_SESSION['puertas']);
}
$puertas = $_SESSION['puertas'];

echo '<h1 style="text-align:center;">Monty Hall Star Wars</h1>';
echo '<p style="text-align:center;">Elige un pasillo. Detrás de uno hay un X-Wing, detrás de los otros dos hay Tie Fighters.</p>';

// Paso 1: Elegir puerta
if ($step == 1) {
	echo '<div style="display:flex;gap:30px;justify-content:center;">';
	for ($i = 0; $i < 3; $i++) {
		echo '<div style="text-align:center;">';
		echo '<img src="img/puerta.png" style="width:300px;height:300px;"><br>Pasillo ' . ($i+1);
		echo '<form method="get"><input type="hidden" name="step" value="2"><input type="hidden" name="puerta" value="' . $i . '"><button type="submit">Elegir</button></form>';
		echo '</div>';
	}
	echo '</div>';
}

// Paso 2: Mostrar cabra y dar opción de cambiar
elseif ($step == 2 && $eleccion !== null) {
	// Buscar una puerta con cabra que no sea la elegida
	$puertaCabra = null;
	for ($i = 0; $i < 3; $i++) {
		if ($puertas[$i] == 'cabra' && $i != $eleccion) {
			$puertaCabra = $i;
			break;
		}
	}
	echo '<div style="display:flex;gap:30px;justify-content:center;">';
	for ($i = 0; $i < 3; $i++) {
		echo '<div style="text-align:center;">';
		if ($i == $puertaCabra) {
			echo '<img src="img/cabra.png" style="width:300px;height:300px;"><br>Tie Fighter';
		} else {
			echo '<img src="img/puerta.png" style="width:300px;height:300px;"><br>Pasillo ' . ($i+1);
			if ($i == $eleccion) echo '<div style="color:blue;font-weight:bold;">Tu elección</div>';
		}
		echo '</div>';
	}
	echo '</div>';
	// Opción de mantener o cambiar
	echo '<hr><form method="get">';
	echo '<input type="hidden" name="step" value="3">';
	echo '<input type="hidden" name="puerta" value="' . $eleccion . '">';
	echo '<input type="hidden" name="cabra" value="' . $puertaCabra . '">';
	echo '<button type="submit" name="accion" value="mantener">Mantener pasillo</button> ';
	for ($i = 0; $i < 3; $i++) {
		if ($i != $eleccion && $i != $puertaCabra) {
			$pasilloCambio = $i;
		}
	}
	echo '<button type="submit" name="accion" value="cambiar">Cambiar a pasillo ' . ($pasilloCambio+1) . '</button>';
	echo '</form>';
}

// Paso 3: Mostrar resultado y actualizar estadísticas
elseif ($step == 3 && $eleccion !== null && $puertaCabra !== null && $accion !== null) {
	if ($accion == 'mantener') {
		$final = $eleccion;
		$_SESSION['mantener_total']++;
	} else {
		for ($i = 0; $i < 3; $i++) {
			if ($i != $eleccion && $i != $puertaCabra) {
				$final = $i;
			}
		}
		$_SESSION['cambiar_total']++;
	}
	// Mostrar todas las puertas abiertas
	echo '<div style="display:flex;gap:30px;justify-content:center;">';
	for ($i = 0; $i < 3; $i++) {
		echo '<div style="text-align:center;">';
		if ($puertas[$i] == 'cabra') {
			echo '<img src="img/cabra.png" style="width:300px;height:300px;"><br>Tie Fighter';
		} else {
			echo '<img src="img/coche.png" style="width:300px;height:300px;"><br>X-Wing';
		}
		if ($i == $final) echo '<div style="color:blue;font-weight:bold;">Tu elección final</div>';
		echo '</div>';
	}
	echo '</div>';
	// Mostrar resultado
	if ($puertas[$final] == 'coche') {
		echo '<h2 style="color:green;">¡Ganaste el X-Wing!</h2>';
		if ($accion == 'mantener') $_SESSION['mantener_ganadas']++;
		else $_SESSION['cambiar_ganadas']++;
	} else {
		echo '<h2 style="color:red;">¡Te tocó un Tie Fighter!</h2>';
	}
	echo '<form method="get"><button type="submit">Jugar de nuevo</button></form>';
}

// Estadísticas
$mantener_total = $_SESSION['mantener_total'];
$cambiar_total = $_SESSION['cambiar_total'];
$mantener_ganadas = $_SESSION['mantener_ganadas'];
$cambiar_ganadas = $_SESSION['cambiar_ganadas'];
$mantener_pct = $mantener_total > 0 ? round($mantener_ganadas / $mantener_total * 100, 1) : 0;
$cambiar_pct = $cambiar_total > 0 ? round($cambiar_ganadas / $cambiar_total * 100, 1) : 0;
echo '<hr><h3>Estadísticas</h3>';
echo '<ul>';
echo '<li>Ganó manteniendo: ' . $mantener_ganadas . ' de ' . $mantener_total . ' (' . $mantener_pct . '%)</li>';
echo '<li>Ganó cambiando: ' . $cambiar_ganadas . ' de ' . $cambiar_total . ' (' . $cambiar_pct . '%)</li>';
echo '</ul>';