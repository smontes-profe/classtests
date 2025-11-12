<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de Conexión PDO</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
        }
        .info-box {
            background: #e7f3ff;
            border-left: 4px solid #007bff;
            padding: 15px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 Test de Conexión PDO - Base de Datos Empresa</h1>
        
        <div class="info-box">
            <h3>Parámetros de conexión:</h3>
            <ul>
                <li><strong>Host:</strong> <?php echo DB_HOST; ?></li>
                <li><strong>Puerto:</strong> <?php echo DB_PORT; ?></li>
                <li><strong>Base de datos:</strong> <?php echo DB_NAME; ?></li>
                <li><strong>Usuario:</strong> <?php echo DB_USER; ?></li>
                <li><strong>Charset:</strong> <?php echo DB_CHARSET; ?></li>
            </ul>
        </div>
        
        <h2>Resultado de la conexión:</h2>
        <?php
        // Incluir el archivo de conexión
        require_once 'conexion.php';
        
        // Si llegamos aquí, la conexión fue exitosa
        if ($pdo instanceof PDO) {
            echo "<div style='background: #d4edda; padding: 15px; border-left: 4px solid #28a745; margin: 20px 0;'>";
            echo "<h3>✅ Conexión establecida correctamente</h3>";
            
            // Información adicional del servidor
            echo "<p><strong>Versión del servidor:</strong> " . $pdo->getAttribute(PDO::ATTR_SERVER_VERSION) . "</p>";
            echo "<p><strong>Driver:</strong> " . $pdo->getAttribute(PDO::ATTR_DRIVER_NAME) . "</p>";
            echo "<p><strong>Estado de la conexión:</strong> Activa y lista para operar</p>";
            echo "</div>";
        }
        ?>
        
        <div style="margin-top: 30px; padding: 15px; background: #fff3cd; border-left: 4px solid #ffc107;">
            <h3>💡 Consejo para pruebas:</h3>
            <p>Para probar el manejo de errores, modifica en <code>config.php</code>:</p>
            <ul>
                <li>La contraseña (DB_PASS)</li>
                <li>El nombre de la base de datos (DB_NAME)</li>
                <li>El host (DB_HOST)</li>
            </ul>
            <p>Y observa cómo se captura y muestra la excepción.</p>
        </div>
    </div>
</body>
</html>