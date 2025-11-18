<?php
// Iniciar la sesión
session_start();

// Obtener el ID de la sesión actual
$session_id = session_id();

// Guardar el valor "Administrador" en la clave rol
$_SESSION['rol'] = 'Administrador';

// Contador de visitas para demostrar que la sesión persiste
if (!isset($_SESSION['contador_visitas'])) {
    $_SESSION['contador_visitas'] = 1;
} else {
    $_SESSION['contador_visitas']++;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - ID de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-top: 0;
            border-bottom: 3px solid #2196F3;
            padding-bottom: 10px;
        }
        .session-info {
            background-color: #e3f2fd;
            padding: 20px;
            border-radius: 4px;
            border-left: 4px solid #2196F3;
            margin: 20px 0;
        }
        .session-id {
            font-family: 'Courier New', monospace;
            font-size: 16px;
            font-weight: bold;
            color: #1565c0;
            word-break: break-all;
            background-color: #fff;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }
       
        button {
            background-color: #2196F3;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        button:hover {
            background-color: #1976D2;
        }
        .btn-verificar {
            background-color: #4CAF50;
            margin-left: 10px;
        }
        .btn-verificar:hover {
            background-color: #45a049;
        }
        .info {
            color: #666;
            font-size: 14px;
            margin-top: 20px;
            padding: 15px;
            background-color: #f5f5f5;
            border-radius: 4px;
        }
        label {
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Información de la Sesión PHP</h1>
        
        <div class="session-info">
            <label>ID de Sesión:</label>
            <div class="session-id"><?php echo $session_id; ?></div>
        </div>

        <div class="session-info">
            <label>Rol del Usuario:</label>
            <div class="session-id"><?php echo $_SESSION['rol']; ?></div>
        </div>

    
        <button class="btn-verificar" onclick="location.href='verificar_acceso.php'">🔐 Verificar Acceso</button>


    </div>
</body>
</html>