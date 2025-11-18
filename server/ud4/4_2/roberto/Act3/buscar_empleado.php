<?php
require_once 'conexion.php';

$resultados = []; // Array para guardar los resultados de la búsqueda
$nombre_buscado = ""; // Para mantener el valor en el formulario (sticky form)
$mensaje = "";

// 1. Comprobar si el formulario ha sido enviado (si 'nombre' existe en GET)
if (isset($_GET['nombre'])) {
    
    // 2. Obtener y limpiar (básico) el término de búsqueda
    $nombre_buscado = $_GET['nombre'];

    try {
        // 3. 🔒 Consulta Preparada
        // NO hacemos: "WHERE nombre LIKE '%$nombre_buscado%'" (¡INYECCIÓN SQL!)
        // Hacemos: "WHERE nombre LIKE :nombre"
        $sql = "SELECT * FROM empleados WHERE nombre LIKE :nombre";

        // 4. Preparar la consulta
        // $pdo "compila" la consulta sin los datos todavía
        $stmt = $pdo->prepare($sql);

        // 5. Preparar el parámetro (para el LIKE)
        $param_nombre = "%" . $nombre_buscado . "%";

        // 6. 🔒 Vincular el parámetro (bindParam)
        // Le decimos a PDO: "El marcador :nombre debe ser reemplazado por
        // el valor de la variable $param_nombre".
        // PDO se encarga de "limpiar" y escapar el valor de forma segura.
        $stmt->bindParam(':nombre', $param_nombre, PDO::PARAM_STR);
        
        // 7. Ejecutar la consulta
        $stmt->execute();

        // 8. Obtener resultados
        if ($stmt->rowCount() > 0) {
            $resultados = $stmt->fetchAll();
        } else {
            $mensaje = "No se encontraron empleados con ese nombre.";
        }

    } catch (PDOException $e) {
        $mensaje = "Error en la búsqueda: " . $e->getMessage();
    }
    
    // Cerrar statement
    $stmt = null;
}

// Cerrar conexión
$pdo = null;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Empleado</title>
    <style>
        /* (Mismos estilos de la tabla de la Actividad 2) */
        table { width: 80%; border-collapse: collapse; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .form-container { text-align: center; margin: 20px; }
        .mensaje { text-align: center; color: red; }
    </style>
</head>
<body>

    <h1 style="text-align:center;">Buscar Empleado por Nombre</h1>

    <div class="form-container">
        <form action="buscar_empleado.php" method="GET">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre_buscado); ?>">
            <button type="submit">Buscar</button>
        </form>
    </div>

    <?php if ($mensaje): ?>
        <p class="mensaje"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <?php if (!empty($resultados)): ?>
        <h3>Resultados de la búsqueda:</h3>
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
                <?php foreach ($resultados as $fila): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fila['id']); ?></td>
                        <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($fila['puesto']); ?></td>
                        <td><?php echo htmlspecialchars($fila['salario']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>