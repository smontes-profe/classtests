<?php
/**
 * Vista para mostrar el listado de empleados.
 *
 * @var \actividad2\model\Empleado[] $empleados Array de objetos Empleado.
 * @var string|null $error Mensaje de error (si existe).
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados (Empresa2)</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #e9ecef; }
        .empty-message { text-align: center; color: #777; background-color: #fdfdfe; padding: 20px; border: 1px dashed #ddd; }
        .error-message { color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>

    <h1>Listado de Empleados</h1>

    <?php if (isset($error)): ?>
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
            </tr>
        </thead>
        <tbody>
            <?php if (empty($empleados)): ?>
                <tr>
                    <td colspan="4" class="empty-message">No se encontraron empleados registrados.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?php echo $empleado->id; ?></td>
                        <td><?php echo $empleado->getNombreSeguro(); ?></td>
                        <td><?php echo $empleado->getPuestoSeguro(); ?></td>
                        <td><?php echo $empleado->getSalarioFormateado(); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>