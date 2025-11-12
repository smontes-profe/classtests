<?php
/**
 * =================================================================
 * VISTA: templates/lista_vista.php
 * =================================================================
 *
 * @var array  $empleados (Definida en el controlador)
 * @var string $error     (Definida en el controlador)
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <style>
        /* (Reutilizamos los estilos de los ejercicios anteriores) */
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #e9ecef; }
        .error-message { color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; }
        .action-links a { margin-right: 10px; text-decoration: none; }
        .action-links a.edit { color: #007bff; }
        .action-links a.delete { color: #dc3545; }
    </style>
</head>
<body>

    <h1>Gestión de Empleados</h1>

    <?php if ($error): ?>
        <div class="error-message">
            <strong>Error:</strong> <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($empleados)): ?>
                <tr>
                    <td colspan="5" style="text-align: center;">No hay empleados registrados.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?php echo $empleado['id']; ?></td>
                        <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                        <td><?php echo number_format($empleado['salario'], 2, ',', '.'); ?> €</td>
                        <td class="action-links">
                            <a href="editar_empleado.php?id=<?php echo $empleado['id']; ?>" class="edit">Editar</a>
                            
                            <a href="eliminar_empleado.php?id=<?php echo $empleado['id']; ?>" class="delete" 
                               onclick="return confirm('¿Estás seguro de que deseas eliminar a <?php echo htmlspecialchars(addslashes($empleado['nombre'])); ?>?');">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>