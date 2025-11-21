<?php 
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista</title>
</head>
<body>
<?php
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT id, nombre, puesto, salario FROM empleados");
    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($empleados) {
        echo "<table border='1'>
                <tr>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>";
        foreach ($empleados as $empleado) {
            echo "<tr>
                    <td>{$empleado['nombre']}</td>
                    <td>{$empleado['puesto']}</td>
                    <td>{$empleado['salario']}</td>
                    <td><a href='empleados.php?id={$empleado['id']}'>Editar</a></td>
                    <td><a href='eliminar.php?id={$empleado['id']}'>Eliminar</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay empleados registrados.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>    
</body>
</html>