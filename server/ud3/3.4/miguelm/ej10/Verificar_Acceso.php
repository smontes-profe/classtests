<?php
// Iniciar la sesión
session_start();

// Verificar si existe la clave 'rol' en $_SESSION
$acceso_permitido = isset($_SESSION['rol']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Acceso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            margin-top: 0;
        }
        .success {
            background-color: #e8f5e9;
            padding: 30px;
            border-radius: 8px;
            border-left: 5px solid #4CAF50;
            margin: 30px 0;
        }
        .success h2 {
            color: #2e7d32;
            margin: 0 0 15px 0;
            font-size: 24px;
        }
        .success .icon {
            font-size: 64px;
            margin-bottom: 15px;
        }
        .success .role {
            font-size: 20px;
            font-weight: bold;
            color: #1b5e20;
            margin-top: 10px;
        }
        .denied {
            background-color: #ffebee;
            padding: 30px;
            border-radius: 8px;
            border-left: 5px solid #f44336;
            margin: 30px 0;
        }
        .denied h2 {
            color: #c62828;
            margin: 0 0 15px 0;
            font-size: 24px;
        }
        .denied .icon {
            font-size: 64px;
            margin-bottom: 15px;
        }
        .denied p {
            color: #b71c1c;
            font-size: 16px;
        }
        button {
            background-color: #2196F3;
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #1976D2;
        }
        .login-button {
            background-color: #4CAF50;
        }
        .login-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Verificación de Acceso</h1>
        
        <?php if ($acceso_permitido): ?>
            <div class="success">
                <div class="icon">✅</div>
                <h2>Acceso Concedido</h2>
                <p>Acceso concedido como:</p>
                <div class="role"><?php echo htmlspecialchars($_SESSION['rol']); ?></div>
            </div>
            <button onclick="location.href='Ej9.php'">← Volver a Inicio</button>
            <button class="destroy-button" onclick="location.href='cerrar_sesion.php'">🗑️ Destruir Sesión</button>
        <?php else: ?>
            <div class="denied">
                <div class="icon">🚫</div>
                <h2>Acceso Denegado</h2>
                <p>No tienes permisos para acceder a esta sección.</p>
                <p>Por favor, inicia sesión primero.</p>
            </div>
            <button class="login-button" onclick="location.href='Ej9.php'">🔑 Login</button>
        <?php endif; ?>
    </div>
</body>
</html>