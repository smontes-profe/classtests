<?php
//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';

//Obtengo el ID del empleado
$id = $_GET['id'] ?? null;

//Si no hay ID muestro el error
if (!$id) {
    die("Error: No se especificó el ID del empleado");
}

try {
    //Conecto con la base de datos
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Si el formulario se envia(se actualiza)
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //Recojo los datos del formulario
        $nombre = $_POST['nombre'];
        $puesto = $_POST['puesto'];
        $salario = $_POST['salario'];
        
        //Hago UPDATE para modificar el empleado con los nuevos datos
        $sql = "UPDATE empleados 
                SET nombre = :nombre, puesto = :puesto, salario = :salario 
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        
        //Ejecuto la consulta con los parametros
        $stmt->execute([
            ':nombre' => $nombre,
            ':puesto' => $puesto,
            ':salario' => $salario,
            ':id' => $id
        ]);
        
        //Mensaje de que todo ha salido bien despues de actualizar
        echo "<p style='color: green;'>Empleado actualizado correctamente</p>";
    }
    
    //Consulto los datos actuales del empleado para mostrar en el formulario
    $stmt = $pdo->prepare("SELECT * FROM empleados WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //Mensaje de error si no existe el empleado
    if (!$empleado) {
        die("Error: Empleado no encontrado");
    }
    
} catch (PDOException $e) {
    //Muestro error si hay algun error con la base de datos
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
</head>
<body>
    <h1>Editar Empleado</h1>
    
    <!--Formulario para editar al empleado-->
    <form method="post">
        <p>
            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="<?= htmlspecialchars($empleado['nombre']) ?>" required>
        </p>
        
        <p>
            <label>Puesto:</label><br>
            <input type="text" name="puesto" value="<?= htmlspecialchars($empleado['puesto']) ?>" required>
        </p>
        
        <p>
            <label>Salario:</label><br>
            <input type="number" name="salario" step="0.01" value="<?= htmlspecialchars($empleado['salario']) ?>" required>
        </p>
        
        <button type="submit">Actualizar Empleado</button>
    </form>
    
    <br>
    <a href="lista.php">← Volver a la lista</a>
</body>
</html>