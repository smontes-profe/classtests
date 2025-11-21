<?php

require 'bootstrapAct5.php';

$error = null;
$exito = null;
$empleados = [];
$builder = null; 

try {
    $config = Config\DatabaseAct5::getAll(); 
    $connection = new Database\ConnectionAct5($config);
    $pdo = $connection->getConnection(); 
    $builder = new Database\QueryBuilder($pdo);

} catch (\Exception $e) {
    $error = "ERROR DE CONEXIÓN: " . $e->getMessage();
}


if ($builder && isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    
    $id = (int)$_GET['delete_id'];
    
    try {
        if ($builder->delete('empleados', $id)) {
            $exito = "Empleado con ID {$id} eliminado correctamente.";
        } else {
            $error = "No se pudo eliminar el empleado con ID {$id}."; 
        }

    } catch (\Exception $e) {
        $error = "Error al ejecutar DELETE: " . $e->getMessage();
    }
}


if (!$error && $builder) {
    try {
        $empleados = $builder->all('empleados');
    } catch (\Exception $e) {
        $error = "Error al cargar la lista: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados (Actividad 5)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de empleados</h1>
        
        <?php if ($exito): ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($exito); ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (!empty($empleados)): ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Salario</th>
                        <th colspan="2" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empleados as $empleado): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($empleado['id']); ?></td>
                            <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                            <td><?php echo htmlspecialchars($empleado['salario']); ?></td>
                            <td class="text-center">
                                <a href="eempleado.php?id=<?php echo $empleado['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                            <td class="text-center">
                                <a href="index.php?delete_id=<?php echo $empleado['id']; ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('¿Está seguro de que desea eliminar a <?php echo htmlspecialchars($empleado['nombre']); ?>?');">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif (!$error): ?>
            <div class="alert alert-info">No hay empleados registrados.</div>
        <?php endif; ?>
    </div>
</body>
</html>