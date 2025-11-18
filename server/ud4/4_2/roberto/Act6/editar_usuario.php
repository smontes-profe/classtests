<?php
require_once 'conexion.php';

$mensaje = "";
$empleado = null; // Para guardar los datos del empleado a editar
$id = null;

// 1.  LÓGICA DE ACTUALIZACIÓN (si el formulario se envió)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario POST
    $id = $_POST['id'] ?? null;
    $nombre = $_POST['nombre'] ?? '';
    $puesto = $_POST['puesto'] ?? '';
    $salario = $_POST['salario'] ?? 0.0;

    // Validación simple
    if (!empty($id) && !empty($nombre)) {
        try {
            // Consulta preparada para UPDATE
            $sql_update = "UPDATE empleados 
                           SET nombre = :nombre, puesto = :puesto, salario = :salario 
                           WHERE id = :id";
            $stmt_update = $pdo->prepare($sql_update);
            
            // Vincular valores
            $stmt_update->bindValue(':nombre', $nombre, PDO::PARAM_STR);
            $stmt_update->bindValue(':puesto', $puesto, PDO::PARAM_STR);
            $stmt_update->bindValue(':salario', $salario); // PDO puede inferir DECIMAL
            $stmt_update->bindValue(':id', $id, PDO::PARAM_INT);
            
            // Ejecutar la actualización
            $stmt_update->execute();
            
            $mensaje = "Empleado actualizado con éxito.";
            
        } catch (PDOException $e) {
            $mensaje = "Error al actualizar: " . $e->getMessage();
        }
    } else {
        $mensaje = "Faltan datos para actualizar.";
    }
}

// 2.  LÓGICA DE OBTENCIÓN DE DATOS (para mostrar el formulario)

// Primero, determinar el ID del empleado que queremos mostrar
if (isset($_GET['id'])) {
    // Si venimos de la lista (GET)
    $id = $_GET['id'];
} elseif (isset($_POST['id'])) {
    // Si acabamos de actualizar (POST), ya tenemos el $id de arriba
    $id = $_POST['id'];
}

// Si tenemos un ID, buscamos al empleado en la BBDD
if ($id) {
    try {
        $sql_fetch = "SELECT * FROM empleados WHERE id = :id";
        $stmt_fetch = $pdo->prepare($sql_fetch);
        $stmt_fetch->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt_fetch->execute();
        
        $empleado = $stmt_fetch->fetch(PDO::FETCH_ASSOC); // Obtener la fila
        
        if (!$empleado) {
            $mensaje = "Empleado no encontrado.";
            $id = null; // No encontramos al empleado
        }
        
    } catch (PDOException $e) {
        $mensaje = "Error al buscar al empleado: " . $e->getMessage();
        $id = null;
    }
} else {
    // Si no hay ID (ni por GET ni por POST), no podemos hacer nada
    if (empty($mensaje)) { // Solo si no hay ya un error
        $mensaje = "No se ha especificado un ID de empleado.";
    }
}

$pdo = null; // Cerramos la conexión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <style>
        /* (Estilos del formulario de la Actividad 4) */
        body { font-family: Arial, sans-serif; display: grid; place-items: center; min-height: 90vh; }
        .container { border: 1px solid #ccc; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 300px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .mensaje { text-align: center; margin: 15px 0; }
        .link-volver { display: block; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Editar Empleado</h2>
        
        <?php if ($mensaje): ?>
            <p class="mensaje"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <?php if ($empleado): ?>
            <form action="editar_empleado.php" method="POST">
            
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($empleado['id']); ?>">
                
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($empleado['nombre']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="puesto">Puesto:</label>
                    <input type="text" id="puesto" name="puesto" value="<?php echo htmlspecialchars($empleado['puesto']); ?>">
                </div>
                <div class="form-group">
                    <label for="salario">Salario:</label>
                    <input type="number" id="salario" name="salario" step="0.01" value="<?php echo htmlspecialchars($empleado['salario']); ?>">
                </div>
                <button type="submit">Actualizar Empleado</button>
            </form>
        <?php endif; ?>
        
        <a href="lista.php" class="link-volver">Volver a la lista</a>
    </div>

</body>
</html>