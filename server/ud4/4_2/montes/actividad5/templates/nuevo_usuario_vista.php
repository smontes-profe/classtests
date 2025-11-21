<?php
/**
 * =================================================================
 * VISTA: templates/nuevo_usuario_vista.php
 * =================================================================
 *
 * @var string|null $error          (Definida en el controlador)
 * @var string|null $success        (Definida en el controlador)
 * @var string      $nombre_usuario (Definida en el controlador)
 * @var string      $email          (Definida en el controlador)
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Usuario</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1 { color: #333; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 400px; }
        form div { margin-bottom: 15px; }
        form label { font-weight: bold; display: block; margin-bottom: 5px; }
        form input[type="text"],
        form input[type="email"],
        form input[type="password"] { 
            width: 95%; /* Ajuste para padding */
            padding: 10px; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
        }
        form button { background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        form button:hover { background-color: #218838; }
        .message { padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .error-message { color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; }
        .success-message { color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>

    <h1>Registrar Nuevo Usuario</h1>

    <?php // --- Mensajes de estado --- ?>
    
    <?php if ($error): ?>
        <div class="message error-message">
            <strong>Error:</strong> <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="message success-message">
            <?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <?php // --- Formulario --- ?>

    <form action="nuevo_usuario.php" method="POST" novalidate>
        <div>
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" 
                   value="<?php echo htmlspecialchars($nombre_usuario, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" 
                   value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <div>
            <button type="submit">Registrar Usuario</button>
        </div>
    </form>

</body>
</html>