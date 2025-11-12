<?php
/**
 * =================================================================
 * VISTA: templates/buscar_empleado_vista.php
 * =================================================================
 *
 * Responsabilidades:
 * 1. Mostrar el HTML.
 * 2. "Pintar" las variables ($resultados, $error, $busqueda)
 * que le ha pasado el Controlador.
 *
 * @var array  $resultados (Definida en el controlador)
 * @var string $error      (Definida en el controlador)
 * @var string $busqueda   (Definida en el controlador)
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Empleado</title>
    <style>
        /* (Los estilos son los mismos que antes) */
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { color: #333; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px; }
        form label { font-weight: bold; display: block; margin-bottom: 5px; }
        form input[type="text"] { width: 300px; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        form button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        form button:hover { background-color: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .empty-message { text-align: center; color: #777; background-color: #fdfdfe; padding: 20px; border: 1px dashed #ddd; }
        .error-message { color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>

    <h1>Buscar Empleado por Nombre</h1>

    <form action="buscar_empleado.php" method="POST">
        <div>
            <label for="nombre">Nombre del empleado:</label>
            <input type="text" id="nombre" name="nombre" 
                   value="<?php echo htmlspecialchars($busqueda, ENT_QUOTES, 'UTF-8'); ?>">
            <button type="submit">Buscar</button>
        </div>
    </form>

    <?php // --- Renderizado de resultados y errores --- ?>

    <?php if ($error): ?>
        <div class="error-message">
            <strong>Error:</strong> <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$error): ?>
        
        <h2>Resultados de la búsqueda</h2>

        <?php if (empty($resultados)): ?>
            
            <div class="empty-message">
                No se encontraron empleados con el nombre "<?php echo htmlspecialchars($busqueda, ENT_QUOTES, 'UTF-8'); ?>".
            </div>

        <?php else: ?>
    
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Salario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $empleado): ?>
                        <tr>
                            <td><?php echo $empleado['id']; ?></td>
                            <td><?php echo htmlspecialchars($empleado['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($empleado['puesto'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo number_format($empleado['salario'], 2, ',', '.'); ?> €</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
        <?php endif; ?>

    <?php endif; ?>

</body>
</html>