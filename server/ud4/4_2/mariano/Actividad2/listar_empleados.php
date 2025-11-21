<?php
require_once 'config.php';
try {
$sql = "SELECT * FROM empleados";
$stmt = $conn->query($sql);
echo "Consulta ejecutada con éxito";
} catch (PDOException $e) {
echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
</head>
<body>
    <h1>Lista de Empleados</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Salario</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($row['puesto']) . "</td>";
                echo "<td>" . htmlspecialchars($row['salario']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>