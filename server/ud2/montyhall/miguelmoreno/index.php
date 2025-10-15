<?php
session_start();

// Inicializar estadísticas
if (!isset($_SESSION['stats'])) {
    $_SESSION['stats'] = ['mantener_gana' => 0, 'mantener_pierde' => 0, 'cambiar_gana' => 0, 'cambiar_pierde' => 0];
}

// Procesar acciones
if (isset($_GET['accion'])) {
    
    if ($_GET['accion'] == 'nuevo') {
        $_SESSION['premio'] = rand(0, 2);
        $_SESSION['fase'] = 'elegir';
        
    } elseif ($_GET['accion'] == 'elegir' && isset($_GET['puerta'])) {
        $_SESSION['elegida'] = $_GET['puerta'];
        
        // Abrir una puerta con cabra
        for ($i = 0; $i < 3; $i++) {
            if ($i != $_SESSION['premio'] && $i != $_SESSION['elegida']) {
                $_SESSION['abierta'] = $i;
            }
        }
        $_SESSION['fase'] = 'decidir';
        
    } elseif ($_GET['accion'] == 'mantener') {
        $_SESSION['final'] = $_SESSION['elegida'];
        $_SESSION['fase'] = 'resultado';
        
        if ($_SESSION['final'] == $_SESSION['premio']) {
            $_SESSION['stats']['mantener_gana']++;
        } else {
            $_SESSION['stats']['mantener_pierde']++;
        }
        
    } elseif ($_GET['accion'] == 'cambiar') {
        // Encontrar la otra puerta cerrada
        for ($i = 0; $i < 3; $i++) {
            if ($i != $_SESSION['elegida'] && $i != $_SESSION['abierta']) {
                $_SESSION['final'] = $i;
                break;
            }
        }
        $_SESSION['fase'] = 'resultado';
        
        if ($_SESSION['final'] == $_SESSION['premio']) {
            $_SESSION['stats']['cambiar_gana']++;
        } else {
            $_SESSION['stats']['cambiar_pierde']++;
        }
        
    } elseif ($_GET['accion'] == 'reset') {
        $_SESSION['stats'] = ['mantener_gana' => 0, 'mantener_pierde' => 0, 'cambiar_gana' => 0, 'cambiar_pierde' => 0];
        $_SESSION['premio'] = rand(0, 2);
        $_SESSION['fase'] = 'elegir';
    }
}

// Iniciar juego si es primera vez
if (!isset($_SESSION['fase'])) {
    $_SESSION['premio'] = rand(0, 2);
    $_SESSION['fase'] = 'elegir';
}

// Calcular porcentajes
$total_mantener = $_SESSION['stats']['mantener_gana'] + $_SESSION['stats']['mantener_pierde'];
$total_cambiar = $_SESSION['stats']['cambiar_gana'] + $_SESSION['stats']['cambiar_pierde'];

$porc_mantener = ($total_mantener > 0) ? round(($_SESSION['stats']['mantener_gana'] / $total_mantener) * 100) : 0;
$porc_cambiar = ($total_cambiar > 0) ? round(($_SESSION['stats']['cambiar_gana'] / $total_cambiar) * 100) : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema de Monty Hall</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        .instrucciones {
            background: #e8f4f8;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            border-left: 4px solid #2196F3;
        }
        
        .puertas {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
        }
        
        .puerta {
            text-align: center;
        }
        
        .puerta img {
            width: 150px;
            height: 200px;
            cursor: pointer;
            border: 3px solid #333;
            border-radius: 5px;
        }
        
        .puerta img:hover {
            border-color: #2196F3;
        }
        
        .puerta.elegida img {
            border-color: #FFC107;
            border-width: 5px;
        }
        
        .puerta.ganadora img {
            border-color: #4CAF50;
            border-width: 5px;
        }
        
        .mensaje {
            text-align: center;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .mensaje.info {
            background: #e3f2fd;
            color: #1976d2;
        }
        
        .mensaje.exito {
            background: #e8f5e9;
            color: #2e7d32;
        }
        
        .mensaje.error {
            background: #ffebee;
            color: #c62828;
        }
        
        .botones {
            text-align: center;
            margin: 20px 0;
        }
        
        .boton {
            display: inline-block;
            padding: 12px 30px;
            margin: 5px;
            background: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .boton:hover {
            background: #1976D2;
        }
        
        .boton.verde {
            background: #4CAF50;
        }
        
        .boton.verde:hover {
            background: #45a049;
        }
        
        .boton.morado {
            background: #9C27B0;
        }
        
        .boton.morado:hover {
            background: #7B1FA2;
        }
        
        .estadisticas {
            background: #f5f5f5;
            padding: 20px;
            margin-top: 30px;
            border-radius: 5px;
        }
        
        .estadisticas h2 {
            text-align: center;
            color: #333;
        }
        
        .stats-tabla {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        
        .stat-item {
            text-align: center;
            background: white;
            padding: 15px;
            border-radius: 5px;
            min-width: 150px;
        }
        
        .stat-valor {
            font-size: 2em;
            font-weight: bold;
            color: #2196F3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>El Problema de Monty Hall</h1>
        
        <?php if ($_SESSION['fase'] == 'elegir'): ?>
            
            <div class="instrucciones">
                <strong>Instrucciones:</strong> Elige una de las tres puertas. Detrás de una hay un coche y detrás de las otras dos hay cabras.
            </div>
            
            <div class="puertas">
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <div class="puerta">
                        <a href="index.php?accion=elegir&puerta=<?php echo $i; ?>">
                            <img src="puerta.jpg" alt="Puerta <?php echo $i + 1; ?>">
                        </a>
                        <p>Puerta <?php echo $i + 1; ?></p>
                    </div>
                <?php endfor; ?>
            </div>
            
        <?php elseif ($_SESSION['fase'] == 'decidir'): ?>
            
            <div class="mensaje info">
                Has elegido la Puerta <?php echo $_SESSION['elegida'] + 1; ?>. 
                He abierto la Puerta <?php echo $_SESSION['abierta'] + 1; ?> que tiene una cabra.
                <br>¿Quieres mantener tu elección o cambiar?
            </div>
            
            <div class="puertas">
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <div class="puerta <?php if ($i == $_SESSION['elegida']) echo 'elegida'; ?>">
                        <?php if ($i == $_SESSION['abierta']): ?>
                            <img src="cabra.webp" alt="Cabra">
                        <?php else: ?>
                            <img src="puerta.jpg" alt="Puerta <?php echo $i + 1; ?>">
                        <?php endif; ?>
                        <p>Puerta <?php echo $i + 1; ?></p>
                    </div>
                <?php endfor; ?>
            </div>
            
            <div class="botones">
                <a href="index.php?accion=mantener" class="boton">Mantener Puerta <?php echo $_SESSION['elegida'] + 1; ?></a>
                <a href="index.php?accion=cambiar" class="boton morado">Cambiar de Puerta</a>
            </div>
            
        <?php elseif ($_SESSION['fase'] == 'resultado'): ?>
            
            <?php $gano = ($_SESSION['final'] == $_SESSION['premio']); ?>
            
            <div class="mensaje <?php echo $gano ? 'exito' : 'error'; ?>">
                <?php if ($gano): ?>
                    ¡FELICIDADES! ¡Ganaste el coche!
                <?php else: ?>
                    Lo siento, ganaste una cabra
                <?php endif; ?>
            </div>
            
            <div class="puertas">
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <div class="puerta <?php if ($i == $_SESSION['premio']) echo 'ganadora'; ?>">
                        <?php if ($i == $_SESSION['premio']): ?>
                            <img src="coche.webp" alt="Coche">
                        <?php else: ?>
                            <img src="cabra.webp" alt="Cabra">
                        <?php endif; ?>
                        <p>Puerta <?php echo $i + 1; ?></p>
                    </div>
                <?php endfor; ?>
            </div>
            
            <div class="botones">
                <a href="index.php?accion=nuevo" class="boton verde">Jugar de Nuevo</a>
            </div>
            
        <?php endif; ?>
        
        <!-- Estadísticas -->
        <div class="estadisticas">
            <h2>Estadísticas</h2>
            
            <div class="stats-tabla">
                <div class="stat-item">
                    <div><strong>Mantener</strong></div>
                    <div class="stat-valor"><?php echo $porc_mantener; ?>%</div>
                    <div><?php echo $_SESSION['stats']['mantener_gana']; ?> / <?php echo $_SESSION['stats']['mantener_pierde']; ?></div>
                </div>
                
                <div class="stat-item">
                    <div><strong>Cambiar</strong></div>
                    <div class="stat-valor"><?php echo $porc_cambiar; ?>%</div>
                    <div><?php echo $_SESSION['stats']['cambiar_gana']; ?> / <?php echo $_SESSION['stats']['cambiar_pierde']; ?></div>
                </div>
                
                <div class="stat-item">
                    <div><strong>Total</strong></div>
                    <div class="stat-valor"><?php echo $total_mantener + $total_cambiar; ?></div>
                    <div>partidas</div>
                </div>
            </div>
            
            <div class="botones">
                <a href="index.php?accion=reset" class="boton morado" onclick="return confirm('¿Resetear estadísticas?');">Resetear</a>
            </div>
        </div>
    </div>
</body>
</html>