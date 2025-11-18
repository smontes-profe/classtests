<?php
/**
 * =================================================================
 * VISTA: templates/editar_empleado_vista.php
 * =================================================================
 *
 * @var array       $empleado (Datos del empleado)
 * @var string|null $error    (Mensaje de error)
 * @var string|null $success  (Mensaje de éxito)
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <style>
        /* (Estilos similares al formulario de nuevo_usuario.php) */
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1 { color: #333; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 400px; }
        form div { margin-bottom: 15px; }
        form label { font-weight: bold; display: block; margin-bottom: 5px; }
        form input { width: 95%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        form button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .message { padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .error-message { color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; }
        .success-message { color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; }
        a.back-link { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>

    <h1>Editar Empleado</h1>

    <?php // --- Mensajes de estado --- ?>
    
    <?php if ($error): ?>
        <div class="message error-message">
            <strong>Error:</strong> <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="message success-message">
            <?php echo htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>

    <?php // --- Formulario --- ?>

    <?php if ($empleado): ?>
        <form action="editar_empleado.php?id=<?php echo $empleado['id']; ?>" method="POST">
            <div>
                <label>ID (No editable):</label>
                <input type="text" value="<?php echo $empleado['id']; ?>" disabled>
            </div>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" 
                       value="<?php echo htmlspecialchars($empleado['nombre']); ?>" required>
            </div>
            
            <div>
                <label for="puesto">Puesto:</label>
                <input type="text" id="puesto" name="puesto" 
                       value="<?php echo htmlspecialchars($empleado['puesto']); ?>">
            </div>
            
            <div>
                <label for="salario">Salario:</label>
                <input type="number" step="0.01" id="salario" name="salario" 
                       value="<?php echo htmlspecialchars($empleado['salario']); ?>" required>
            </div>
            
            <div>
                <button type="submit">Aceptar Cambios</button>
            </div>
        </form>
    <?php endif; ?>

    <a href="lista.php" class="back-link">&larr; Volver a la lista</a>

</body>
</html>