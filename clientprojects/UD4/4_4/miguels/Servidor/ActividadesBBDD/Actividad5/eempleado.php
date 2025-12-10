<?php

require 'bootstrapAct5.php';

$error = null;
$exito = null;
$empleado = [
    'id' => null,
    'nombre' => '',
    'puesto' => '',
    'salario' => ''
];
$is_editing = false;
$builder = null;

try {
    $config = Config\DatabaseAct5::getAll();
    $connection = new Database\ConnectionAct5($config);
    $pdo = $connection->getConnection();
    $builder = new Database\QueryBuilder($pdo);

} catch (\Exception $e) {
    $error = "ERROR DE CONEXIÓN: " . $e->getMessage();
}

// Manejar el envío del formulario para actualizar el empleado, comprobamos que es POST y que tenemos el builder
if ($builder && $_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Validar y sanitizar datos recibidos
    $id = isset($_POST['id']) && is_numeric($_POST['id']) ? (int)$_POST['id'] : null;
    // Preparar los datos para la actualización
    $data = [
        'nombre' => trim($_POST['nombre']),
        'puesto' => trim($_POST['puesto']),
        'salario' => (float)str_replace(',', '.', trim($_POST['salario'])) 
    ];

    // Si no hay ID, no permitimos insertar nuevos registros en este formulario
    if (!$id) {
         $error = "Operación no permitida. Este formulario es solo para edición (UPDATE).";
         // Mantener los datos ingresados para mostrarlos de nuevo
         $empleado = array_merge($empleado, $data); 
    }

    elseif (empty($data['nombre']) || empty($data['puesto']) || $data['salario'] <= 0) {
         $error = "Nombre, Puesto y Salario son obligatorios.";
         $empleado = array_merge($empleado, ['id' => $id], $data); 
         $is_editing = true;
    } 
    else {
        try {
            // Si todo es válido, intentamos actualizar el registro
            if ($builder->update('empleados', $id, $data)) {
                $exito = "Empleado ID {$id} actualizado correctamente.";
                $empleado = array_merge($empleado, ['id' => $id], $data);
                $is_editing = true; 
            } else {
                $error = "No se pudo actualizar el registro. (Puede que el ID no exista)";
            }
        } catch (\Exception $e) {
            $error = "Error en la operación de BBDD: " . $e->getMessage();
            $empleado = array_merge($empleado, ['id' => $id], $data);
            $is_editing = true;
        }
    }
}

// Si es una solicitud GET con ID, cargamos los datos del empleado para editar
$id_to_load = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Cargar datos del empleado si estamos en modo edición y no es POST
if ($builder && $id_to_load && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    try {
        // Cargar los datos del empleado desde la base de datos
        $empleado_data = $builder->find('empleados', $id_to_load);
        
        if ($empleado_data) {
            $empleado = array_merge($empleado, $empleado_data); 
            $is_editing = true;
        } else {
            // Si no se encuentra el empleado, redirigir con error
            header('Location: index.php?error=' . urlencode('El empleado solicitado no existe.'));
            exit;
        }
    } catch (\Exception $e) {
        $error = "Error al cargar los datos: " . $e->getMessage();
    }
}

// Título dinámico según la operación
$title = $is_editing ? "Editar Empleado ID " . $empleado['id'] : "Operación no válida";

if (!$is_editing && $_SERVER['REQUEST_METHOD'] !== 'POST') {
     header('Location: index.php?error=' . urlencode('Esta página requiere un ID de empleado para editar.'));
     exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4"><?php echo $title; ?></h1>
        
        <?php if ($exito): ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($exito); ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if ($is_editing): ?>
            <form action="eempleado.php" method="POST" class="bg-light p-4 rounded shadow-sm">
                
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($empleado['id'] ?? ''); ?>">
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($empleado['nombre']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="puesto" class="form-label">Puesto</label>
                    <input type="text" id="puesto" name="puesto" class="form-control" value="<?php echo htmlspecialchars($empleado['puesto']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="salario" class="form-label">Salario</label>
                    <input type="number" step="0.01" id="salario" name="salario" class="form-control" value="<?php echo htmlspecialchars($empleado['salario']); ?>" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
                
                <a href="index.php" class="btn btn-secondary">Volver al Listado</a>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>